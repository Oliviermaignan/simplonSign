<?php

namespace src\Controllers;

use DateTime;
use src\Models\Users;
use src\Repositories\ClassesRepository;
use src\Services\Response;
use src\Repositories\UsersRepository;

class HomeController
{

    use Response; 

    public function index()
    {
        $this->render('connexion');
    }

    public function auth(){

        $data = file_get_contents('php://input');
        if (!empty($data)){
            $data = json_decode($data);
        
            $email = htmlspecialchars($data->email);
            $password = htmlspecialchars($data->password);
    
            $UsersRepo = new UsersRepository();
            $user = $UsersRepo->getUserByMail($email);

            $passwordFromDb = $user->getPassword();
    
            $isConnected = password_verify($password, $passwordFromDb);
            
            //recupération des cours de la journée
            $classesRepo = new ClassesRepository();
            $todayClasses = $classesRepo->getClassesByDay(new DateTime());


            $promoClassCode = $classesRepo->getNowClassCode();

            if($isConnected){
                $_SESSION['connected'] = true;
                $_SESSION['user']['id'] = $user->getId();
                $_SESSION['user']['name'] = $user->getName();
                $_SESSION['user']['lastName'] = $user->getLastName();
                $_SESSION['user']['email'] = $user->getEmail();
                $_SESSION['user']['activated'] = $user->getActivated();
                $_SESSION['user']['role'] = $user->getRole();
                $_SESSION['user']['promoName'] = $user->getPromoName();
                if ($promoClassCode){
                    $_SESSION['class']['code']=$promoClassCode;
                }
            }

            include_once __DIR__  . "/../Views/dashboard.php";
        }
    }

    public function session_destroy(){
        if(isset($_SESSION['connected']) && $_SESSION['connected'] === true){
            if (session_destroy()){
                echo true;
            };
        }
    }

    public function page404()
    {
        echo "erreur";
    }
}
