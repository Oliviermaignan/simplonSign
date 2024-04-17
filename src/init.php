<?php
require_once __DIR__ . '/autoload.php';

date_default_timezone_set('Europe/Paris');

// On démarre la session :
session_start();
// session_destroy();

// Vérification que la base de données est bien existante
require_once __DIR__ . "/../config.php";

// if (DB_INITIALIZED == FALSE) {
//   $db = new src\Models\Database();
//   echo $db->initialisationBDD();
// }

require_once __DIR__ . "/router.php";