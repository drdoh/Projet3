<?php $title = 'Mon blog'; ?>
<?php 
  if(isset($_SESSION['admin'])){
    $value = 'Déconnexion';
    $url = 'index.php?action=disconnexion' ;
  }else{
    $value = 'Connexion';
    $url = 'index.php?action=admin' ;
  }
?>


<?php ob_start(); ?>

    <!-- Navigation -->
 
    <nav class="navbar navbar-expand-lg navbar-light border border-top-0" id="">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="<?='index.php'?>">Jean Forteroche</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?='index.php?action=aboutme'?>">A Propos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#last-post">Mes derinieres Aventures</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?=$url?>"><?=$value?></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<?php $nav = ob_get_clean(); ?>

