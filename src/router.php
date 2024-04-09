<?php

use src\Repositories\UsersRepository;
use src\Controllers\HomeController;


$HomeController = new HomeController;

$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];


if (!isset($_SESSION['connecté'])) {
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
    case HOME_URL.'dashboard':
        echo 'vous êtes sur la dashboard';

    default:
        $HomeController->page404();
        break;
}
