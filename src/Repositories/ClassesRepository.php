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

    public function getTodayAMClass() {
        $date = new DateTime();
        $formattedDate = $date->format('Y-m-d');
        $query = $this->Db->prepare ("
                                        SELECT * FROM b6_classes
                                        WHERE DATE(startTime) = :formattedDate
                                        AND name = 'AM';
                                    ");
    $query->bindValue(':formattedDate', $formattedDate);
    $query -> setFetchMode(PDO::FETCH_CLASS, Classes::class);
    $query->execute();
    $result = $query->fetch();
    return $result;
    }

    public function createCodeForClass($promoId){
        $query = $this->Db->prepare ("
                                        UPDATE b6_Classes
                                        SET code = LPAD(10000 + FLOOR(RAND() * 99999), 5, '0')
                                        WHERE promo_id = :promo_id
                                        AND DATE(startTime) = CURDATE()
                                        AND TIME(NOW()) BETWEEN TIME(startTime) AND TIME(endTime);
                                    ");
        $query->bindValue(':promo_id', $promoId);
        $query->execute();
    }

    public function getNowClassCode(){
        $query = $this->Db->prepare ("  SELECT b6_classes.code FROM `b6_classes`
                                        WHERE  DATE(startTime) = CURDATE()
                                        AND TIME(NOW()) BETWEEN TIME(startTime) AND TIME(endTime);"
                                    );
        $query -> setFetchMode(PDO::FETCH_OBJ);
        $query->execute();
        $result = $query->fetch();
        return $result;
    }
    public function getNowClassByPromo($promoId){
        $query = $this->Db->prepare ("  SELECT * 
                                        FROM `b6_classes`
                                        WHERE DATE(startTime) = CURDATE()
                                        AND TIME(NOW()) BETWEEN TIME(startTime) AND TIME(endTime)
                                        AND promo_id = :promo_id;"
                                    );
        $query->bindParam(':promo_id', $promoId);
        $query->execute();
        $query -> setFetchMode(PDO::FETCH_CLASS, Classes ::class);
        $result = $query->fetch();
        return $result;
    }



}