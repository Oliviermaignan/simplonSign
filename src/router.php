<?php

use src\Repositories\UsersRepository;
use src\controllers\HomeController;


$HomeController = new HomeController;

$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];

switch ($route) {
    case HOME_URL:
        if (isset($_SESSION['connecté'])) {
        header('location: '.HOME_URL.'dashboard');
        die;
        } else {
        $HomeController->index();
        }
        break;
    case HOME_URL.'dashboard':
        echo 'vous êtes sur la dashboard';

    default:
        $HomeController->page404();
        break;
}
