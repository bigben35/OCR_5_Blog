<?php
//empty — Détermine si une variable est vide
//isset — Détermine si une variable est déclarée et est différente de null
session_start();

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try{
    $frontController = new \Blog\Controllers\FrontController();
    $backController = new \Blog\Controllers\AdminController();//objet controller, on instancie la class adminController (copie de la class adminController)

    $getAction = filter_input(INPUT_GET, 'action');
    
    if(isset($getAction) && !empty($getAction)) {
        if ($getAction == 'home') {
           
            $frontController->home();
        }

        // envois mail dans la bdd 
        elseif ($getAction == 'contactPost') {
            $nom = htmlspecialchars(filter_input(INPUT_POST, 'nom'));
            $prenom = htmlspecialchars(filter_input(INPUT_POST, 'prenom'));
            $email = htmlspecialchars(filter_input(INPUT_POST, 'email'));
            $objet = htmlspecialchars(filter_input(INPUT_POST, 'objet'));
            $message = htmlspecialchars(filter_input(INPUT_POST, 'message'));
            if (!empty($nom) && (!empty($prenom) && (!empty($email) && (!empty($objet) && (!empty($message)))))) {
                $frontController->contactPost($nom, $prenom, $email, $objet, $message);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis, A vous de jouer !!');
            }
        }



        // display page blog 
        elseif (filter_input(INPUT_GET, 'action') == 'blog'){
            $getPage = filter_input(INPUT_GET, 'page');
            if (isset($getPage) && !empty($getPage)) {

                $currentPage = (int) strip_tags($getPage);

            } else {
                $currentPage = 1;
            }

            $frontController->blog($currentPage);
        }

        // display page sentMail 
        elseif(filter_input(INPUT_GET, 'action') == 'sentMail'){
            $frontController->sentMail();

        }

        // display page createUser 
        elseif ($getAction == 'createUser'){
            $frontController->pageCreateUser();
        }

        // create an user 
        elseif ($getAction == 'storeUser'){
            $pseudo = htmlspecialchars(filter_input(INPUT_POST, 'pseudo'));
            $email = htmlspecialchars(filter_input(INPUT_POST, 'email'));
            $pass = htmlspecialchars(filter_input(INPUT_POST, 'password'));
            $password = password_hash($pass, PASSWORD_DEFAULT); //crée une clé de hachage pour un password

            $frontController->createUser($pseudo, $email, $password);
            // var_dump($password);die;
        }

        // display page connectUser 
        elseif ($getAction == 'connexion'){
            $frontController->pageConnectUser();
        }

        // log in user 
        elseif ($getAction == 'connectUser'){

            $email = htmlspecialchars(filter_input(INPUT_POST, 'email'));
            $password = filter_input(INPUT_POST, 'password');
            if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($password)){
                $frontController->connectUser($email, $password);
            } else {
                throw new Exception("Veuillez renseigner vos identifiants pour vous connecter à votre session");
            }
        }

        // display page dashboard user 
        elseif ($getAction == 'dashboardUser'){
            if(isset($_SESSION['id']) && (isset($_SESSION['role']) && ($_SESSION['role'] == "0"))){
                $id = filter_input(INPUT_GET, 'id');
                $frontController->dashboardUser($id);
            }
            else {
                throw new Exception("Veuillez renseigner vos identifiants pour vous connecter à votre session");
            }
        }

        
        // display page update pseudo user 
        elseif ($getAction == 'pageUpdatePseudo'){
            $getId = filter_input(INPUT_GET, 'id');
            $frontController->pageUpdatePseudo($getId);
        }
        
        // get new pseudo 
        elseif ($getAction == 'updatePseudo'){
            $postNewPseudo = filter_input(INPUT_POST, 'newPseudo');
            $postPseudoConfirm = filter_input(INPUT_POST, 'pseudoConfirm');
            if(isset($_SESSION['id']) && isset($postNewPseudo) && isset($postPseudoConfirm)){
                $id = filter_input(INPUT_GET, 'id');
                
                $newPseudo = htmlspecialchars(filter_input(INPUT_POST, 'newPseudo'));
                $pseudoConfirm = htmlspecialchars(filter_input(INPUT_POST, 'pseudoConfirm'));

                $frontController->createNewPseudo($newPseudo, $id);
                // var_dump($frontController);die;
            }
        }

        // display page update email user 
        elseif ($getAction == 'pageUpdateEmail'){
            $getId = filter_input(INPUT_GET, 'id');
            $frontController->pageUpdateEmail($getId);
        }
        
        // get new pseudo 
        elseif ($getAction == 'updateEmail'){
            $postNewEmail = filter_input(INPUT_POST, 'newEmail');
            $postEmailConfirm = filter_input(INPUT_POST, 'emailConfirm');
            if(isset($_SESSION['id']) && isset($postNewEmail) && isset($postEmailConfirm)){
                $id = filter_input(INPUT_GET, 'id');
                
                $newEmail = htmlspecialchars($postNewEmail);
                $emailConfirm = htmlspecialchars($postEmailConfirm);

                $frontController->createNewEmail($newEmail, $id);
                // var_dump($frontController);die;
            }
        }


        // get new password
        elseif(filter_input(INPUT_GET, 'action') == 'pageUpdatePassword'){
            $frontController->pageUpdatePassword(filter_id('id'));
        }

        // get new password 
        elseif (filter_input(INPUT_GET, 'action') == 'updatePassword'){
            $postOldPassword = filter_input(INPUT_POST, 'oldPassword');
            $postNewPassword = filter_input(INPUT_POST, 'newPassword');
            $postPasswordConfirm = filter_input(INPUT_POST, 'passwordConfirm');
            if(isset($_SESSION['id']) && isset($postOldPassword) && isset($postNewPassword) && isset($postPasswordConfirm)){
                $id = filter_input(INPUT_GET, 'id');
                
                $oldPassword = htmlspecialchars(filter_input(INPUT_POST, 'oldPassword'));
                $newPassword = htmlspecialchars(filter_input(INPUT_POST, 'newPassword'));
                $passwordConfirm = htmlspecialchars(filter_input(INPUT_POST, 'passwordConfirm'));

                $frontController->createNewPassword($oldPassword, $newPassword, $id);
                // var_dump($frontController);die;
            }
        }

        // log out user 
        elseif ($getAction == 'deconnexion'){
            $frontController->disconnectUser();
        }


        // ==================PARTIE ADMIN============================== 

        // dashboard admin 
        elseif(filter_input(INPUT_GET, 'action') == 'dashboard'){
            if(isset($_SESSION['id']) && (isset($_SESSION['role']) && ($_SESSION['role'] == "1"))){

                $backController->dashboard();
            }
            else {
                throw new Exception("Veuillez renseigner vos identifiants pour vous connecter à votre session");
            }
        }

        // list users 
        elseif(filter_input(INPUT_GET, 'action') == 'listUsers'){
            $backController->displayListUser();
        }

        // list email 
        elseif(filter_input(INPUT_GET, 'action') == 'listEmail'){
            $backController->displayListEmail();
        }

        // list comment 
        elseif(filter_input(INPUT_GET, 'action') == 'listComment'){
            $backController->displayListComment();
        }

        // list posts 
        elseif(filter_input(INPUT_GET, 'action') == 'listPosts'){
            $backController->displayListPost();
        }

    } else {
        $frontController->home();
    }


} catch (Exception $e) {
    echo 'Erreur : '.$e->getMessage();
}