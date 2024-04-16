<?php

namespace src\Repositories;

use src\Models\Users;
use PDO;
use src\Models\Database;
use src\Models\PresenceStatus;

class UsersRepository
{
  private $Db;

    public function __construct()
    {
        $database = new Database;
        $this->Db = $database->getDb();

        require_once __DIR__ . '/../../config.php';
    }

    public function creationNewPresenceStatus(PresenceStatus $presenceStatus): bool{
        $sql = 'INSERT INTO b6_relation_users_classes (user_id, authentication_id, classes_id, dateTime) VALUES (:user_id, :authentication_id, :classes_id, :dateTime);';


        $statement = $this->Db->prepare($sql);

        return $statement->execute([
            'userId'                          => $presenceStatus->getUserId(),
            'authenticationId'                => $presenceStatus->getAuthenticationId(),
            'classesId'                       => $presenceStatus->getClassesId(),
            'dateTime'                        => $presenceStatus->getDateTime()
        ]);
    }
}