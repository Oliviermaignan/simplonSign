<?php
include_once __DIR__ . "/Includes/header.php";
?>

<form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label fw-bold">Email*</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label fw-bold">Mot de passe*</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button id="buttonSubmitConnexion" type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
include_once __DIR__  . "/Includes/footer.php";
?>

