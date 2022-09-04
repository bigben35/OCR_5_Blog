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
}