<?php

namespace src\Controllers;

use DateTime;
use src\Models\Users;
use src\Repositories\ClassesRepository;
use src\Services\Response;
use src\Repositories\UsersRepository;
use src\Repositories\PresenceStatusRepository;

class ClassesController
{

    use Response; 

    public function createCode(){

        $promoName = $_SESSION['user']['promoName'];
        if ($promoName==='premierepromo'){
            $promoId = 1;
        } else if ($promoName==='deuxiemepromo'){
            $promoId = 2;
        } else {
            $promoId = null;
        };

        $classesRepo = new ClassesRepository;
        $classesRepo->createCodeForClass($promoId);
        $code = $classesRepo->getNowClassCode();
        $todayClasses = $classesRepo->getClassesByDay(new DateTime());

        // Je récup l'id du cours qui a lieu actuellement avec le userID et les promos qui lui sont rattachées
        $userRepo = new UsersRepository();
        $classId = $userRepo->getClassesIdByUser($_SESSION['user']['id']);
        $classId = $classId->classesId;
        $_SESSION['class']['id']=$classId;

        $_SESSION['class']['code'] = $classesRepo->getNowClassCode();
        
        if (isset($code)){
            echo $classesRepo->getNowClassCode()->code;
        } else {
            'pas de code dispo';
        }   
    }

    public function createPresenceStatus(){

        $promoName = $_SESSION['user']['promoName'];
        if ($promoName==='premierepromo'){
            $promoId = 1;
        } else if ($promoName==='deuxiemepromo'){
            $promoId = 2;
        } else {
            $promoId = null;
        };
        $classesId = $_SESSION['class']['id'];
        $presenceStatusRepo = new PresenceStatusRepository();

        //le 1 ici correspond au role ID que je rentre en dur pour signifier que je ne crée que pour les élèves
        $presenceStatusRepo->createStatus($classesId, $promoId, 1);
    }

    public function updatePresenceStatus(){


        $data = file_get_contents('php://input');
        if (!empty($data)){
            $data = json_decode($data);
        
            $codeInput = (int) filter_var( $data->code, FILTER_SANITIZE_NUMBER_FLOAT);
            
            if ($_SESSION['connected']){
                $id = $_SESSION['user']['id'];
            }

            $usersRepo = new UsersRepository;
            $promoId = $usersRepo->getPromoIdByUserId($id);
            $classesRepo = new ClassesRepository;
            $promoClassCode = $classesRepo->getNowClassCodeByPromo($promoId->promo_id);
            $promoClassCode = $promoClassCode->code;
             
            if ($promoClassCode === $codeInput){
                echo 'commencez l"enregistrement presence';
               
                //création de authenticationId
                //ici il faut faire un traitement par rapport à l'heure
                //ressortir le cours qui correspond a maintenant
                //comparer avec le temps actuel 


                $presenceStatusRepo = new PresenceStatusRepository();

                $presenceStatusRepo->updateStatus ($authenticationId, $userId);
            }

        }
    }

}