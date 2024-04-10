<nav class="navbar navbar-expand-lg navbar-light bg-primary bg-gradient d-flex justify-content-between">
  <a class="navbar-brand ms-5" href="#">SIMPLON</a>
  <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> -->
  <div>
        <?php 
        if(isset($_SESSION) && !empty($_SESSION)){
            if($_SESSION['connected'] === true){
         ?>
        <button class="btn btn-warning me-5" href="#" id="connexion">Déconnexion</button>
        <?php }} else { ?>
        <button class="btn btn-light me-5" href="#" id="connexion">Connexion</button>
        <?php } ?> 
  </div>
</nav>

