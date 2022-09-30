<?php

namespace Blog\Controllers;

use Exception;

class FrontController
{
    // display page home 
    function home()
    {
        // last posts 
        $homeManager = new \Blog\Models\PostManager();
        $lastPosts = $homeManager->getLastPosts();

        require "src/Views/Front/home.php";
    }

    // display page blog 
    function blog(int $currentPage)
    {
        // count number post 
        $postManager = new \Blog\Models\PostManager();
        $nbposts =$postManager->countPosts();

        // nb posts per page 
        $perPage = 6;

        // calcul nb pages 
        $pages = ceil($nbposts / $perPage);

        $firstPost = ($currentPage * $perPage) - $perPage;
        $posts = $postManager->postsPerPage($firstPost, $perPage);


        require 'src/Views/Front/blog.php';
    }


    // display page post 
    function post(int $idPost)
    {
        // display post 
        $postManager = new \Blog\Models\PostManager();
        
        if($postManager->exist_idPost($idPost)){
        $post = $postManager->displayPost();

        // create a comment
        $comments = $postManager->comment();
        
        // display post comments 
        $postComments = $postManager->getComment();

        // number comment 
        $numberComment = $postManager->countComment();

        require 'src/Views/Front/post.php';
        }else{
            throw new Exception("L'article demandé n'existe pas !");
        }
    }

    // display sentComment page 
    function sentComment()
    {
        require 'src/Views/Front/sentComment.php';
    }
     
    
    // contact form 
    function contactPost(string $nom, string $prenom, string $email, string $objet, string $message)
    {
        $contactManager = new \Blog\Models\ContactModel();
        extract($_POST); //vérifie chaque clé afin de contrôler si elle a un nom de variable valide. Elle vérifie également les collisions avec des variables existantes dans la table des symboles. Utile pour $email et $confirmEmail.
        $validation = true;
        $erreur = [];
        $nom = filter_input(INPUT_POST, 'nom');
        $prenom = filter_input(INPUT_POST, 'prenom');
        $email = filter_input(INPUT_POST, 'email');

        if(empty($nom) || empty($prenom) || empty($email) || empty($confirmEmail) || empty($objet) || empty($message)){
            $validation = false;
            $erreur[] = "Tous les champs sont requis !";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $validation = false;
            $erreur[] = "L'adresse email n'est pas valide !";
        }
        if($email != $confirmEmail){
            $validation = false;
            $erreur[] = "Vos e-mails ne sont pas identiques !";
        }
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && $email === $confirmEmail) {
            $validation;
            
            
            
            // send email to mailbox 
                $dest = "josselincrenn@gmail.com";
                $sujet = filter_input(INPUT_POST, 'objet');
                $message = filter_input(INPUT_POST, 'message');
                $message = wordwrap($message, 70, "\r\n");
                $headers = [
                    "From" => filter_input(INPUT_POST, 'email'),
                    "Reply-To" => filter_input(INPUT_POST, 'email'),
                    "Content-Type" => "text/html; charset=utf-8"
                ];
                mail($dest, $sujet, $message, $headers);

    
    $sendMessage = $contactManager->requestWithContactForm($nom, $prenom, $email, $objet, $message);

    header("Location: sentMail");
    
    } else{
        require 'src/Views/Front/home.php';
        return $erreur;
    }
    }

    // display sentMail page 
    function sentMail()
    {
        require 'src/Views/Front/sentMail.php';
    }

    // display page create an account 
    function pageCreateUser()
    {
        require 'src/Views/Front/createUserPage.php';
    }

    // create an user 
    function createUser(string $pseudo, string $email, string $password)
    {
        extract($_POST);
        $userManager = new \Blog\Models\UserManager();
        $validation = true;
        $erreur = [];
        $pseudo = filter_input(INPUT_POST, 'pseudo');
        $email = filter_input(INPUT_POST, 'email');
        $emailconf = filter_input(INPUT_POST, 'emailconf');

        if (empty($pseudo) || empty($email) || empty($emailconf) || empty($password) || empty($passwordconf)) {
            $validation = false;
            $erreur[] = "Tous les champs sont requis !";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $validation = false;
            $erreur[] = "L'adresse email n'est pas valide !";
         }

        if($emailconf != $email){
            $validation = false;
            $erreur[] = "L'email de confirmation n'est pas correct !";
        }
    
        if($passwordconf != $password){
            $validation = false;
            $erreur[] = "Le mot de passe de confirmation n'est pas correct !";
        }

        if($userManager->existPseudo($pseudo)){
            $validation = false;
            $erreur[] = "Ce pseudo est déjà utilisé !";
        }

        if($userManager->existEmail($email)){
            $validation = false;
            $erreur[] = "Cet Email est déjà utilisé !";
        }

         
        if ($validation && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $createUser = $userManager->createUser($pseudo, $email, $password);

        require 'src/Views/Front/connectPage.php';
        }
        else{
           require 'src/Views/Front/createUserPage.php';
           return $erreur;
        }
    }


    // display page connectUser
    function pageConnectUser()
    {
        require 'src/Views/Front/connectPage.php';
    }


    // login to dashboard after password comparison 
    function connectUser(string $email, string $password)
    // retrieve password 
    {
        $userManager = new \Blog\Models\UserManager();
        $connectUser = $userManager->retrievePassword($email);
        $result = $connectUser->fetch();
        $erreur = "Les identifiants sont erronés !";

        // Les sessions permettent de conserver des variables sur toutes les pages de votre site même lorsque la page PHP a fini d'être générée.  
        if(!empty($result)) {   
            $isPasswordOk = password_verify($password, $result['password']);
            if($isPasswordOk){
                $_SESSION['email'] = $result['email']; // transformation des variables recupérées en session
                $_SESSION['password'] = $result['password'];
                $_SESSION['id'] = $result['id'];
                $_SESSION['pseudo'] = $result['pseudo'];
                $_SESSION['role'] = $result['role'];
                if($result['role'] == 0){
                header("Location: dashboardUser");
                }
                else{
                    header('Location: dashboard');
            }
        } else {
            $erreur;
            require "src/Views/Front/connectPage.php";
        }
        
    }else {
        $erreur = "L' email est inconnu";
        require "src/Views/Front/connectPage.php";
    }
    }

    // display dashboard user page 
    function dashboardUser()
    {
            require 'src/Views/Front/dashboardUser.php';
    }

    // display page update pseudo user 
    function pageUpdatePseudo(int $id)
    {
        require 'src/Views/Front/pageUpdatePseudo.php';
    }

    // update for new pseudo 
    function createNewPseudo(string $newPseudo, int $id)
    {
        extract($_POST); //permet d'utiliser variables déclarées ailleurs
        $validation = true;
        $erreur = []; "Tous les champs sont requis !";
        $validation = "Votre pseudo a bien été modifié !";

        if( empty($newPseudo) || empty($pseudoConfirm)){
            $validation = false;
            $erreur = "Tous les champs sont requis !";
        }

        if ($newPseudo != $pseudoConfirm){
            $validation = false;
            $erreur[] = 'Les pseudos ne sont pas identiques';
        }

        if($newPseudo && $newPseudo === $pseudoConfirm){
            $userManager = new \Blog\Models\UserManager();
            $getNewPseudo = $userManager->newPseudoUser($newPseudo, $id);

            // true/false dans$getNewPseudo
            //refaire un if/else pour que l'user sache si ça s'est bien passé ou pas 
            $_SESSION['pseudo'] = $newPseudo;
            require 'src/Views/Front/dashboardUser.php';
            return $validation;
            // si faux affiche une exception ca ne s'est pas bien passé
        } else{
            require 'src/Views/Front/pageUpdatePseudo.php';
            return $erreur;
        }
    }


    // display page update pseudo user 
    function pageUpdateEmail(int $id)
    {
        require 'src/Views/Front/pageUpdateEmail.php';
    }


    // update for new email 
    function createNewEmail(string $newEmail, int $id)
    {
        extract($_POST); //permet d'utiliser variables déclarées ailleurs
        $validation = true;
        $erreur = []; "Tous les champs sont requis !";
        $validation = "Votre email a bien été modifié !";

        if( empty($newEmail) || empty($emailConfirm)){
            $validation = false;
            $erreur = "Tous les champs sont requis !";
        }

        if ($newEmail != $emailConfirm){
            $validation = false;
            $erreur[] = 'Les emails ne sont pas identiques';
        }

        if($newEmail && $newEmail === $emailConfirm){
            $userManager = new \Blog\Models\UserManager();
            $getNewEmail = $userManager->newEmailUser($newEmail, $id);
        
            // true/false dans$getNewEmail
            //refaire un if/else pour que l'user sache si ça s'est bien passé ou pas 
            $_SESSION['email'] = $newEmail;
            require 'src/Views/Front/dashboardUser.php';
            return $validation;
            // si faux affiche une exception ca ne s'est pas bien passé
        } else{
            require 'src/Views/Front/pageUpdateEmail.php';
            return $erreur;
        }
    }

    // go to page update password 
    function pageUpdatePassword(int $id)
    {
        require 'src/Views/Front/pageUpdatePassword.php';
    }

    // update for new paswword 
    function createNewPassword(string $oldPassword, string $newPassword, int $id)
    {
        extract($_POST); //permet d'utiliser variables déclarées ailleurs
        $validation = true;
        $erreur = []; "Tous les champs sont requis !";
        $validation = "Votre Mot de passe a bien été modifié !";
       

        if(empty($oldPassword) || empty($newPassword) || empty($passwordConfirm)){
            $validation = false;
            $erreur = "Tous les champs sont requis !";
        }

        if($newPassword){
            $userManager = new \Blog\Models\UserManager();
            $getPassword = $userManager->updatePasswordUser($id);

            $verifPassword = $getPassword->fetch();
            $isPasswordOk = password_verify($oldPassword, $verifPassword['password']);

            if(!$isPasswordOk){
                $validation = false;
                $erreur[] = "le mot de passe actuel est erroné";
            }

            if ($newPassword != $passwordConfirm){
                $validation = false;
                $erreur[] = 'Les mots de passe ne sont pas identiques';
            }
            
            if($isPasswordOk && $newPassword === $passwordConfirm){
                $updateNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $getNewPassword = $userManager->newPasswordUser($updateNewPassword, $id);
                
                $_SESSION['password'] = $updateNewPassword;
                require 'src/Views/Front/dashboardUser.php';
                return $validation;
                
            } else{
                require 'src/Views/Front/pageUpdatePassword.php';
                return $erreur;
            }
        }
    }

    // log out user 
    function disconnectUser()
    {
        unset($_SESSION['id']); //détruit la session
        session_destroy();
        header('Location: connexion');

    }
}

