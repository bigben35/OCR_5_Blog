<?php
//empty — Détermine si une variable est vide
//isset — Détermine si une variable est déclarée et est différente de null
session_start();

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try{
    $frontController = new \Blog\Controllers\FrontController();

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
    } else {
        $frontController->home();
    }


} catch (Exception $e) {
    echo 'Erreur : '.$e->getMessage();
}