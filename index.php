<?php
//empty — Détermine si une variable est vide
//isset — Détermine si une variable est déclarée et est différente de null
session_start();

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try{
    $frontController = new \Blog\Controllers\FrontController();

    if(filter_input(INPUT_GET, 'action') && !empty(filter_input(INPUT_GET, 'action'))) {
        if (filter_input(INPUT_GET, 'action') == 'home') {
           
            $frontController->home();
        }

        // envois mail dans la bdd 
        elseif (filter_input(INPUT_GET, 'action') == 'contactPost') {
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

        // display page createUser 
        elseif (filter_input(INPUT_GET, 'action') == 'createUser'){
            $frontController->pageCreateUser();
        }

        // create an user 
        elseif (filter_input(INPUT_GET, 'action') == 'storeUser'){
            $pseudo = htmlspecialchars(filter_input(INPUT_POST, 'nom'));
            $email = htmlspecialchars(filter_input(INPUT_POST, 'nom'));
            $pass = htmlspecialchars(filter_input(INPUT_POST, 'password'));
            $password = password_hash($pass, PASSWORD_DEFAULT); //crée une clé de hachage pour un password

            $frontController->createUser($pseudo, $email, $password);
            // var_dump($password);die;
        }

        // display page connectUser 
        elseif (filter_input(INPUT_GET, 'action') == 'connexion'){
            $frontController->pageConnectUser();
        }

        // log in user 
        elseif (filter_input(INPUT_GET, 'action') == 'connectUser'){

            $email = htmlspecialchars(filter_input(INPUT_POST, 'email'));
            $password = filter_input(INPUT_POST, 'password');
            if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($password)){
                $frontController->connectUser($email, $password);
            } else {
                throw new Exception("Veuillez renseigner vos identifiants pour vous connecter à votre session");
            }
        }

        // display page dashboard user 
        elseif (filter_input(INPUT_GET, 'action') == 'dashboardUser'){
            if(isset($_SESSION['id']) && (isset($_SESSION['role']) && ($_SESSION['role'] == "0"))){
                
                $frontController->dashboardUser($_GET['id']);
            }
            else {
                throw new Exception("Veuillez renseigner vos identifiants pour vous connecter à votre session");
            }
        }

        
        // display page update pseudo user 
        elseif (filter_input(INPUT_GET, 'action') == 'pageUpdatePseudo'){
            $frontController->pageUpdatePseudo($_GET['id']);
        }
        
        // get new pseudo 
        elseif (filter_input(INPUT_GET, 'action') == 'updatePseudo'){
            if(isset($_SESSION['id']) && isset($_POST['newPseudo']) && isset($_POST['pseudoConfirm'])){
                $id = filter_id('id');
                
                $newPseudo = htmlspecialchars(filter_input(INPUT_POST, 'newPseudo'));
                $pseudoConfirm = htmlspecialchars(filter_input(INPUT_POST, 'pseudoConfirm'));

                $frontController->createNewPseudo($newPseudo, $id);
                // var_dump($frontController);die;
            }
        }

        // display page update email user 
        elseif (filter_input(INPUT_GET, 'action') == 'pageUpdateEmail'){
            $frontController->pageUpdateEmail($_GET['id']);
        }
        
        // get new pseudo 
        elseif (filter_input(INPUT_GET, 'action') == 'updateEmail'){
            if(isset($_SESSION['id']) && filter_input(INPUT_POST, 'newEmail') && isset($_POST['emailConfirm'])){
                $id = filter_id('id');
                
                $newEmail = htmlspecialchars(filter_input(INPUT_POST, 'newEmail'));
                $emailConfirm = htmlspecialchars(filter_input(INPUT_POST, 'emailConfirm'));

                $frontController->createNewEmail($newEmail, $id);
                // var_dump($frontController);die;
            }
        }

        // log out user 
        elseif (filter_input(INPUT_GET, 'action') == 'deconnexion'){
            $frontController->disconnectUser();
        }

    } else {
        $frontController->home();
    }


} catch (Exception $e) {
    echo 'Erreur : '.$e->getMessage();
}