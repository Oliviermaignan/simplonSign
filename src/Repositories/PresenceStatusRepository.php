<?php

namespace src\Repositories;

use src\Models\Users;
use PDO;
use src\Models\Database;
use src\Models\PresenceStatus;

class PresenceStatusRepository
{
  private $Db;

    public function __construct()
    {
        $database = new Database;
        $this->Db = $database->getDb();

        require_once __DIR__ . '/../../config.php';
    }

    public function creationNewPresenceStatus(PresenceStatus $presenceStatus): bool{
        $sql = '
                    INSERT INTO 
                        b6_relation_users_classes 
                        (user_id, authentication_id, classes_id, dateTime) 
                    VALUES 
                        (:user_id, :authentication_id, :classes_id, :dateTime);
                ';

        $statement = $this->Db->prepare($sql);

        return $statement->execute([
            'userId'                          => $presenceStatus->getUserId(),
            'authenticationId'                => $presenceStatus->getAuthenticationId(),
            'classesId'                       => $presenceStatus->getClassesId(),
            'dateTime'                        => $presenceStatus->getDateTime()
        ]);
    }

    
    public function createStatus($classesId, $promoId, $roleId){
    //il faut essayer que le status soit crée automatiquement à partir de la génération du code
    $sql = '
                INSERT INTO b6_relation_users_classes (user_id, classes_id, dateTime)
                SELECT bu.id, :classes_id, now()
                FROM b6_users bu
                WHERE bu.promo_id = :promo_id AND bu.role_id = :role_id;
            ';
    $statement = $this->Db->prepare($sql);

    return $statement->execute([
        'classes_id'              => $classesId,
        'promo_id'                => $promoId,
        'role_id'                 => $roleId
    ]);
    }

    public function updateStatus ($authenticationId, $userId){
        $query = $this->Db->prepare ("
            UPDATE b6_relation_users_classes
            SET b6_relation_users_classes.authentication_id = :authenticationId
            WHERE user_id = :userId
            AND DATE(dateTime) = CURDATE();
        ");
        $query->bindValue(':authenticationId', $authenticationId);
        $query->bindValue(':userId', $userId);
        $query->execute();
    }
}