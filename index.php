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

    if(isset($_GET['action']) && !empty($_GET['action'])) {
        if ($_GET['action'] == 'home') {
           
            $frontController->home();
        }

        // envois mail dans la bdd 
        elseif ($_GET['action'] == 'contactPost') {
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $email = htmlspecialchars($_POST['email']);
            $objet = htmlspecialchars($_POST['objet']);
            $message = htmlspecialchars($_POST['message']);
            if (!empty($nom) && (!empty($prenom) && (!empty($email) && (!empty($objet) && (!empty($message)))))) {
                $frontController->contactPost($nom, $prenom, $email, $objet, $message);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis, A vous de jouer !!');
            }
        }



        // display page blog 
        elseif (filter_input(INPUT_GET, 'action') == 'blog'){

            if (isset($_GET['page']) && !empty($_GET['page'])) {

                $currentPage = (int) strip_tags(filter_input(INPUT_GET, 'page'));

            } else {
                $currentPage = 1;
            }

            $frontController->blog($currentPage);

        // display page sentMail 
        elseif(filter_input(INPUT_GET, 'action') == 'sentMail'){
            $frontController->sentMail();

        }

        // display page createUser 
        elseif ($_GET['action'] == 'createUser'){
            $frontController->pageCreateUser();
        }

        // create an user 
        elseif ($_GET['action'] == 'storeUser'){
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $email = htmlspecialchars($_POST['email']);
            $pass = htmlspecialchars($_POST['password']);
            $password = password_hash($pass, PASSWORD_DEFAULT); //crée une clé de hachage pour un password

            $frontController->createUser($pseudo, $email, $password);
            // var_dump($password);die;
        }

        // display page connectUser 
        elseif ($_GET['action'] == 'connexion'){
            $frontController->pageConnectUser();
        }

        // log in user 
        elseif ($_GET['action'] == 'connectUser'){

            $email = htmlspecialchars($_POST['email']);
            $password = $_POST['password'];
            if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($password)){
                $frontController->connectUser($email, $password);
            } else {
                throw new Exception("Veuillez renseigner vos identifiants pour vous connecter à votre session");
            }
        }

        // display page dashboard user 
        elseif ($_GET['action'] == 'dashboardUser'){
            if(isset($_SESSION['id']) && (isset($_SESSION['role']) && ($_SESSION['role'] == "0"))){
                
                $frontController->dashboardUser($_GET['id']);
            }
            else {
                throw new Exception("Veuillez renseigner vos identifiants pour vous connecter à votre session");
            }
        }

        
        // display page update pseudo user 
        elseif ($_GET['action'] == 'pageUpdatePseudo'){
            $frontController->pageUpdatePseudo($_GET['id']);
        }
        
        // get new pseudo 
        elseif ($_GET['action'] == 'updatePseudo'){
            if(isset($_SESSION['id']) && isset($_POST['newPseudo']) && isset($_POST['pseudoConfirm'])){
                $id = $_GET['id'];
                
                $newPseudo = htmlspecialchars($_POST['newPseudo']);
                $pseudoConfirm = htmlspecialchars($_POST['pseudoConfirm']);

                $frontController->createNewPseudo($newPseudo, $id);
                // var_dump($frontController);die;
            }
        }

        // display page update email user 
        elseif ($_GET['action'] == 'pageUpdateEmail'){
            $frontController->pageUpdateEmail($_GET['id']);
        }
        
        // get new pseudo 
        elseif ($_GET['action'] == 'updateEmail'){
            if(isset($_SESSION['id']) && isset($_POST['newEmail']) && isset($_POST['emailConfirm'])){
                $id = $_GET['id'];
                
                $newEmail = htmlspecialchars($_POST['newEmail']);
                $emailConfirm = htmlspecialchars($_POST['emailConfirm']);

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
            if(isset($_SESSION['id']) && isset($_POST['oldPassword']) && isset($_POST['newPassword']) && isset($_POST['passwordConfirm'])){
                $id = $_GET['id'];
                
                $oldPassword = htmlspecialchars(filter_input(INPUT_POST, 'oldPassword'));
                $newPassword = htmlspecialchars(filter_input(INPUT_POST, 'newPassword'));
                $passwordConfirm = htmlspecialchars(filter_input(INPUT_POST, 'passwordConfirm'));

                $frontController->createNewPassword($oldPassword, $newPassword, $id);
                // var_dump($frontController);die;
            }
        }

        // log out user 
        elseif ($_GET['action'] == 'deconnexion'){
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