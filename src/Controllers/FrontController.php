<?php

namespace Blog\Controllers;

class FrontController 
{
    // display page home 
    function home()
    {
        require "src/Views/Front/home.php";
    }


    // contact form 
    function contactPost($nom, $prenom, $email, $objet, $message)
    {
        $contactManager = new \Blog\Models\ContactModel();
        extract($_POST); //vérifie chaque clé afin de contrôler si elle a un nom de variable valide. Elle vérifie également les collisions avec des variables existantes dans la table des symboles. Utile pour $email et $confirmEmail.
        $validation = true;
        $erreur = [];
        

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
            $sendMessage = $contactManager->requestWithContactForm($nom, $prenom, $email, $objet, $message);
            
            $valide = "Votre message a bien été envoyé !";
            unset($_POST['nom']);
            unset($_POST['prenom']);
            unset($_POST['email']);                 // vide/détruit ce qui est en mémoire
            require 'src/Views/Front/home.php';
            return $valide;
        
        } else{
            require 'src/Views/Front/home.php';
            return $erreur;
        }
    }


    // display page create an account 
    function pageCreateUser()
    {
        require 'src/Views/Front/createUserPage.php';
    }

    // create an user 
    function createUser($pseudo, $email, $password)
    {
        extract($_POST);
        $userManager = new \Blog\Models\UserManager();
        $validation = true;
        $erreur = [];

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
            $erreur[] = "L'email de confirmation n'est pas correcte !";
        }
    
        if($passwordconf != $password){
            $validation = false;
            $erreur[] = "Le mot de passe de confirmation n'est pas correcte !";
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
    function connectUser($email, $password)
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
                header("Location: index.php?action=dashboardUser");
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

    // log out user 
    function disconnectUser()
    {
        unset($_SESSION['id']); //détruit la session
        session_destroy();
        header('Location: index.php?action=connexion');

    }
}

