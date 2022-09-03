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
    } else {
        $frontController->home();
    }


} catch (Exception $e) {
    echo 'Erreur : '.$e->getMessage();
}