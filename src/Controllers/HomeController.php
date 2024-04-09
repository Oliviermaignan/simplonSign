<?php

namespace src\Controllers;

use src\Services\Response;

class HomeController
{

    use Response; 

    public function index()
    {
        $this->render('accueilMDP');
    }

    public function auth(){
        $data = file_get_contents('php://input');

        $data = json_decode($data);

        echo json_encode("Reponse serveur : j'ai bien recu ". $data);


        // if ($password === 'admin') {
        //     $_SESSION['connecté'] = TRUE;
        //     header('location: '.HOME_URL.'dashboard');
        //     die();
        //   } else {
        //     header('location: '.HOME_URL.'?erreur=connexion');
        //   }
    }

    public function page404()
    {
        echo "erreur";
    }
}
