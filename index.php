<?php
//empty — Détermine si une variable est vide
//isset — Détermine si une variable est déclarée et est différente de null
session_start();

require_once __DIR__ . '/vendor/autoload.php';
require_once 'src/Views/Admin/layoutsAdmin/secure.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// GESTION DES ERREURS
function eCatcher($e) {
    if($_ENV["APP_ENV"] == "development") {
        $whoops = new \Whoops\Run;
        $whoops->allowQuit(false);
        $whoops->writeToOutput(false);
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $html = $whoops->handleException($e);
        require "src/Views/Front/errorCatch.php";
    //  var_dump($e);die;   //a commenter en production
    }
  }

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
        elseif ($getAction == 'blog'){
            $getPage = filter_input(INPUT_GET, 'page');
            if (isset($getPage) && !empty($getPage)) {

                $currentPage = (int) strip_tags($getPage);

            } else {
                $currentPage = 1;
            }

            $frontController->blog($currentPage);
        }


        // display page post 
        elseif($getAction == 'post'){
            $id = filter_input(INPUT_GET, 'id');
            // $commentaire = htmlspecialchars(filter_input(INPUT_POST, 'commentaire'));
            if(!$id){
                header("Location: blog");
            }
            else{
                
                $frontController->post($id);
            }
        }

        elseif($getAction == 'post&id='){
            $id = filter_input(INPUT_GET, 'id');
            // $commentaire = htmlspecialchars(filter_input(INPUT_POST, 'commentaire'));

            $frontController->post($id);
            
        }


        // display page sentMail 
        elseif($getAction == 'sentMail'){
            $frontController->sentMail();

        }

         // display page sentComment 
         elseif($getAction == 'sentComment'){
            $frontController->sentComment();

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
                $frontController->dashboardUser();
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
        elseif($getAction == 'pageUpdatePassword'){
            $frontController->pageUpdatePassword(filter_id('id'));
        }

        // get new password 
        elseif ($getAction == 'updatePassword'){
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
        elseif($getAction == 'dashboard'){
            if(isset($_SESSION['id']) && (isset($_SESSION['role']) && ($_SESSION['role'] == "1"))){

                $backController->dashboard();
            }
            else {
                throw new Exception("Veuillez renseigner vos identifiants pour vous connecter à votre session");
            }
        }

        // list users 
        elseif($getAction == 'listUsers'){
            isAdmin();
            $backController->displayListUser();
        }



        // ===========================EMAIL ==========================

        // list email 
        elseif($getAction == 'listEmail'){
            isAdmin();
            $backController->displayListEmail();
        }

        // show one email 
        elseif($getAction == 'showEmail'){
            isAdmin();
            $id = filter_input(INPUT_GET, 'id');
            $isRead = filter_input(INPUT_GET, 'estVu');
            $backController->showEmail($id, $isRead);
        }

        // delete email 
        elseif($getAction == 'deleteEmail'){
            isAdmin();
            $id = filter_input(INPUT_GET, 'id');
            $backController->deleteEmail($id);
        }
        // ===================COMMENT=============================

        // list comment 
        elseif($getAction == 'listComment'){
            isAdmin();
            $backController->displayListComment();
        }

        // no validate comment 
        elseif($getAction == 'noValidateComment'){
            isAdmin();
            $backController->displayNoValidateComment();
        }

        // to validate comment 
        elseif($getAction == 'validateComment'){
            isAdmin();
            $id = filter_input(INPUT_GET, 'id');
            $isValide = filter_input(INPUT_GET, 'estValide');
            $backController->validateComment($id, $isValide);
        }

        // delete comment 
        elseif($getAction == 'deleteComment'){
            isAdmin();
            $id = filter_input(INPUT_GET, 'id');
            $backController->deleteComment($id);
        }



        // =======================POSTS =============================
        // list posts 
        elseif($getAction == 'listPosts'){
            isAdmin();
            $backController->displayListPost();
        }

        // page one post 
        elseif($getAction == 'onePost'){
            isAdmin();
            $id = filter_input(INPUT_GET, 'id');
            $idPost = filter_input(INPUT_GET, 'id');
            $backController->displayPostById($id, $idPost);
        }

        // display page createPost 
        elseif($getAction == 'createPost'){
            isAdmin();
            $backController->pageNewPost();
        }

        // create new post 
        elseif($getAction == 'addPost'){
            isAdmin();
            $backController->createPost();
        }


        // display page update post 
        elseif($getAction == 'pageUpdatePost'){
            $id = filter_input(INPUT_GET, 'id');
            $idPost = filter_input(INPUT_GET, 'id');
            $backController->displayPageUpdatePost($id, $idPost);
        }

          // update post 
          elseif($getAction == 'updatePost'){
            $titre = filter_input(INPUT_POST, 'titre');
            $chapo = filter_input(INPUT_POST, 'chapo');
            $contenu = filter_input(INPUT_POST, 'contenu');
            $id = filter_input(INPUT_GET, 'id');
            // var_dump($titre, $chapo, $contenu, $id);die;
            $backController->updatePost($id, $titre, $chapo, $contenu);
        }

        // delete post 
        elseif($getAction == 'deletePost'){
            isAdmin();
            $id = filter_input(INPUT_GET, 'id');
            $backController->deletePost($id);
        }
        // page not exist 
        else{
            throw new Exception("Cette page n'existe pas !");
          }


    } else {
        $frontController->home();
    }


} catch (Exception $e) {
    eCatcher($e);
    if ($e->getCode() === 404) {
        die('Erreur : ' . $e->getMessage());
      } else {
        require 'src/Views/Front/error/error404.php';
      }
} 