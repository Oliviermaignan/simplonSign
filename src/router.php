<?php

use src\Controllers\ClassesController;
use src\Controllers\HomeController;
use src\Repositories\ClassesRepository;

$HomeController = new HomeController;
$ClassesController = new ClassesController;

$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];


if (!isset($_SESSION['connected'])) {
    $route = HOME_URL;
}

switch ($route) {
    case HOME_URL:
        if ($methode == "GET") {
            $HomeController->index();
        }
        if ($methode == "POST") {
            $HomeController->auth();
        }
        break;
    case HOME_URL . 'creationCode':
        $ClassesController->createCode();
        $ClassesController->createPresenceStatus();
        break;
    case HOME_URL . 'deconnexion':
        $HomeController->session_destroy();
        break;
    case HOME_URL . 'studentPresenceValidation':
        $ClassesController->updatePresenceStatus();
        //ca va necessité de crée la class pour la table intermediaire
        break;
    default:
        $HomeController->page404();
        break;
}
