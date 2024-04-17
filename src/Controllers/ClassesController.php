<?php

namespace src\Controllers;

use DateTime;
use DateTimeZone;
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

            //recup id et id class selon iduser
            $usersRepo = new UsersRepository;
            $promoId = $usersRepo->getPromoIdByUserId($id);
            $classId = $usersRepo->getClassesIdByUser($id);
            $classId = $classId->classesId;


            $classesRepo = new ClassesRepository;
            $newClass = $classesRepo->getNowClassByPromo($promoId->promo_id);
            $promoClassCode = $newClass->getCode();

            if ($promoClassCode === $codeInput){

                $presenceStatusRepo = new PresenceStatusRepository();

                //heure acutelle en france
                $currentTime = new DateTime('now', new DateTimeZone('Europe/Paris'));
                $currentTimeStamp = $currentTime->getTimestamp();
                //heure de debut de cours
                $startTime = $newClass->getStartTime()->getTimeStamp();
 
                //calcul de la difference
                $diff = $currentTimeStamp - $startTime;
                
                $quinzeMinutesEnSeconde = 15*60;

                if ($diff>$quinzeMinutesEnSeconde){

                    //update du status de l'étudiant
                    $presenceStatusRepo->updateStatus (2, $id, $classId);


                    $numberOfLate = $presenceStatusRepo->checkingLate($id);
                    $numberOfElements = count($numberOfLate);

                    $data = array(
                        'numberOfElements' => $numberOfElements,
                        'late' => true
                    );
                    $jsonOutput = json_encode($data, JSON_PRETTY_PRINT);
                    echo $jsonOutput;

                } else {
                    $presenceStatusRepo->updateStatus (1, $id);

                }



            }

        }
    }

}