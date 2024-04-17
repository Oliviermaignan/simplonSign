<?php
if(isset($_SESSION['connected'])) {
    $connected = $_SESSION['connected'];
    $id = $_SESSION['user']['id'];
    $name = ucfirst($_SESSION['user']['name']);
    $lastName = $_SESSION['user']['lastName'];
    $email = $_SESSION['user']['email'];
    $activated = $_SESSION['user']['activated'];
    $role = $_SESSION['user']['role'];
    $promoName = $_SESSION['user']['promoName'];    

    //première lettre en majuscule pour passer à l'id
    $roleForId = ucfirst($role);
}
if ($role === 'student') {
    ?>
    
    <?php include_once __DIR__ . "/Includes/header.php"?>
    <?php include_once __DIR__ . "/Includes/navbar.php"?>
    <ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Accueil</a>
    </li>
    </ul>

    <div class="container-md bg-secondary-subtle py-5 w-50 p-3 mt-5 mb-5 rounded">
        <div class="d-flex justify-content-between">
        <p class="fw-semibold">Bienvenue <?= $name ?></p>
            <p class="fw-semibold">Nous sommes le <?php echo date('d/m/Y'); ?></p>
        </div>

    <form class="row g-3">
        <div class="">
        <label for="inputCode" class="form-label">Code *</label>
        <input type="text" class="form-control" id="inputCode" aria-describedby="inputCode" placeholder="inscrivez ici le code donné par votre formateur.ice">
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-primary" id="StudentPresenceValidation">Valider présence</button>
        </div>
    </form>
    </div>
    <?php include_once __DIR__ . "/Includes/toast.php"?>


    <?php
} else {
    ?>
    <?php include_once __DIR__ . "/Includes/header.php"?>
    <?php include_once __DIR__ . "/Includes/navbar.php"?>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Accueil</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Promotion</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Utilisateurs</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active w-50 p-3 m-auto d-flex flex-column justify-content-center cours-container" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
        
    <!-- container cours après midi -->
    <?php foreach ($todayClasses as $class): ?>
        <?php include __DIR__  . "/Includes/classesCard.php"; ?>
    <?php endforeach; ?>

    </div>
    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">

    <div class="container-md bg-secondary-subtle m-auto mt-5 rounded">
        <h3>données en dur</h3>
    </div>

    </div>
    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">

    <div class="container-md bg-secondary-subtle m-auto mt-5 rounded">
        <h3>données en dur</h3>

    </div>

    </div>

    <?php include_once __DIR__ . "/Includes/toast.php"?>

    <?php
}
?>
