
<?php
ob_start();
?>

<h1 class="text-center"> A propos de moi </h1>
<p class="text-center"><a href="index.php">Retour à l'accueil</a></p>
<hr class="my-4">
<!-- First Container -->
<div class="container-fluid bg-1 text-center">
  <h3 class="margin">Qui suis-je ?</h3>
  <div class="row">
    <div class="col-lg-2">

    </div>
    <div class="col-lg-8">
      <img src="web/img/portfolio/aboutme/me.jpg" class="img-thumbnail rounded" alt="Moi">
    </div>
    <div class="col-lg-2">
  </div>
  </div>
</div>
<hr class="my-4">
<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">Que suis-je ?</h3>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
</div>
<hr class="my-4">
<!-- Third Container (Grid) -->
<div class="container-fluid bg-3 text-center">    
  <h3 class="margin">Ou me trouver ?</h3><br>
  <div class="row">
    <div class="col-sm-4">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <img src="web/img/portfolio/aboutme/3.jpg" class="img-responsive margin" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-4"> 
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <img src="web/img/portfolio/aboutme/4.jpg" class="img-responsive margin" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-4"> 
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <img src="web/img/portfolio/aboutme/5.jpg" class="img-responsive margin" style="width:100%" alt="Image">
    </div>
  </div>
</div>


<?php
$content = ob_get_clean();

require('view/layout.php');
?>
