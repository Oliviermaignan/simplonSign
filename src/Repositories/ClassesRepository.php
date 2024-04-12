<?php

namespace src\Repositories;

use DateTime;
use src\Models\Classes;
use PDO;
use src\Models\Database;

class ClassesRepository
{
  private $Db;

    public function __construct()
    {
        $database = new Database;
        $this->Db = $database->getDb();

        require_once __DIR__ . '/../../config.php';
    }

    public function getClassesByDay($date = null) {
        // Si aucune date n'est fournie, utiliser la date actuelle
        if ($date === null) {
            $date = new DateTime();
        }

        $formattedDate = $date->format('Y-m-d');
    
        $query = $this->Db->prepare("
            SELECT * FROM b6_classes
            WHERE DATE(startTime) = :formattedDate
        ");
        $query->bindValue(':formattedDate', $formattedDate);
        $query -> setFetchMode(PDO::FETCH_CLASS, Classes::class);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    public function createCodeForClass($promoId, $name){
        $query = $this->Db->prepare ("
                                        UPDATE b6_Classes
                                        SET code = LPAD(FLOOR(RAND() * 99999), 5, '0')
                                        WHERE promo_id = :promo_id
                                        AND name = :name;
                                        AND DATE(startTime) = CURDATE();
                                    ");
        $query->bindValue(':promo_id', $promoId);
        $query->bindValue(':name', $name);
        $query->execute();
    }

}