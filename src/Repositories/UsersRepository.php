<?php

namespace src\Repositories;

use src\Models\Users;
use PDO;
use src\Models\Database;

class UsersRepository
{
  private $Db;

    public function __construct()
    {
        $database = new Database;
        $this->Db = $database->getDb();

        require_once __DIR__ . '/../../config.php';
    }

    public function getUserByMail($email){
    $query = $this->Db->prepare("
                                    SELECT 
                                        b6_users.id,
                                        b6_users.name,
                                        b6_users.last_name,
                                        b6_users.email,
                                        b6_users.activated,
                                        b6_users.password,
                                        b6_role.type AS role,
                                        b6_promo.name AS promo_name
                                    FROM
                                        b6_users
                                    LEFT JOIN
                                        b6_role on b6_users.role_id = b6_role.id
                                    LEFT JOIN
                                        b6_promo on b6_users.promo_id = b6_promo.id 
                                    WHERE B6_users.email = :email;
                                ");
    $query->bindParam(':email', $email);
    $query->execute();
    $query -> setFetchMode(PDO::FETCH_CLASS, Users::class);
    $result = $query->fetch();
    return $result;
    }
}