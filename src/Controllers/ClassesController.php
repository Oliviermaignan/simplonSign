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

}