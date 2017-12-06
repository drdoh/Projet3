<?php ob_start(); ?>

<div class="container">
  <div class="jumbotron">
      <form class="form-signin" method="post" action="index.php?action=signin">

        <h2 class="form-signin-heading">Connectez vous</h2><br/>

          <?php if(isset($message)){echo $message;}?>

        <p>
          <label for="inputEmail" class="sr-only">Nom</label>
          <input type="Name" name="name" id="inputName" class="form-control" placeholder="Votre nom" required autofocus>
        </p>

        <p>
          <label for="inputPassword" class="sr-only">Mot de passe</label>
          <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Votre mot de passe" required>
        </p>

        <button class="mt-5 btn btn-lg btn-primary btn-block" type="submit"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Connexion</button><br/>

    </form>

    <a href="index.php">
      <button class="btn btn-lg btn-secondary btn-block">
        <i class="fa fa-home fa-fw" aria-hidden="true"></i> Retourner a l'accueil
      </button>
    </a>

  </div>
</div>

<?php
$content = ob_get_clean();
require('view/layout.php');
?>

