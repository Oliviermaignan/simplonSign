<?php

namespace src\Controllers;

use DateTime;
use src\Models\Users;
use src\Repositories\ClassesRepository;
use src\Services\Response;
use src\Repositories\UsersRepository;

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

        $_SESSION['class']['code'] = $classesRepo->getNowClassCode();
        
        if (isset($code)){
            echo $classesRepo->getNowClassCode()->code;
        } else {
            'pas de code dispo';
        }   
    }

    public function checkStudentCode(){


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
                //creation d'une class presence avec la date et l'id du statut
            }

        }
    }

}