<?php
$currentTime = new DateTime('now', new DateTimeZone('Europe/Paris'));
$currentHour = $currentTime->format('H');
$noon = new DateTime('12:00:00', new \DateTimeZone('Europe/Paris'));
$noon = $noon->format('H');
?>
    <div class="container-md bg-secondary-subtle mt-5 mb-5 rounded d-flex justify-content-between">
        <div class="d-flex flex-column mt-2 ms-3 justify-content-center">
            <h3><?= $class->getName() . '-' . $class->getStartTime()->format('d/m/Y');?></h3>
            <p>15 participants.es</p>
        </div>

        <!-- ici attention un peu de logique en fonction de l'heure le code saffiche dans la bonne div -->
        
        <div class="displayCode <?php   
                if ($class->getName()==='AM'){echo 'AM';}
                 if ($class->getName()==='PM'){echo 'PM';};
                ?>

        d-flex align-items-center">
            <?php
            if (!empty($_SESSION['class']['code'])){
                if ($currentHour < $noon){
                    if ($class->getName()==='AM'){
                           echo  $_SESSION['class']['code']->code;
                    }}
               if ($currentHour > $noon){
               if ($class->getName()==='PM'){
                       echo  $_SESSION['class']['code']->code;
                };
                }
            }
            ?>
        </div>
        
    <button type="button" class="btn btn-primary mt-auto mb-auto me-3" id="presenceValidation<?=$class->getName().$roleForId?>">

        <?php  
            // If it's before noon
            if ($class->getName() === 'AM' && $currentHour < $noon) {
                echo 'Validation presence';
            } else if ($class->getName() === 'AM') {
                echo 'signatures reccueillies';
            } 
            if ($class->getName() === 'PM' && $currentHour > $noon) {
                if(!empty($_SESSION['class']['code'])){
                    echo 'Code déjà généré';
                } else {
                    echo 'Validation presence';
                }
                    
                } else if ($class->getName() === 'PM') {
                    echo 'non disponible';
                }
        ?>
    
    </button>
    </div>
    







