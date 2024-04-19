<?php

namespace src\Models;

use PDO;
use PDOException;

class Database {
    private $Db;
    private $config;

    public function __construct()
    {
        $this->config = __DIR__ . '/../../config.php';
        require_once $this->config;

        try {
            $base = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
            $base = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
            $this->Db = new PDO($base, DB_USER, DB_PWD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $error) {
          echo 'Erreur de connexion à la base de Données : '. $error->getMessage();
        }
    }
    public function getDb(): PDO
    {
      return $this->Db;
    } 

    function initialiserBDD()
    {
        if ($this->DBexiste()) {
            return "La base de donnees exite";
            die();
        }

        try {
            $sql = file_get_contents(__DIR__ . "/../Migrations/simplonSign0.sql");
            $this->Db->query($sql);


            if ($this->MiseAJourConfig()) {
                return "installation de la Base de Données terminée !";
            }
        } catch (PDOException $err) {
            return "impossible de remplir la Base de données : " . $err->getMessage();
        }
    }

    function DBexiste()
    {

        $existe = $this->Db->query('SHOW TABLES FROM ' . DB_NAME . ' LIKE \'b6_users\'')->fetch();
        if ($existe !== false && $existe[0] == "b6_users") {
            return true;
        } else {
            return false;
        }
    }

    private function MiseAJourConfig(): bool
    {

        $fconfig = fopen($this->config, 'w');

        $contenu = "<?php
        // lors de la mise en open source, remplacer les infos concernant la base de données.
        
        define('DB_HOST', '" . DB_HOST . "');
        define('DB_NAME', '" . DB_NAME . "');
        define('DB_USER', '" . DB_USER . "');
        define('DB_PWD', '" . DB_PWD . "');
        
        define('HOME_URL', '" . HOME_URL . "');

        // Ne pas toucher :
        
        define('DB_INITIALIZED', TRUE);";


        if (fwrite($fconfig, $contenu)) {
            fclose($fconfig);
            return true;
        } else {
            return false;
        }
    }
}

