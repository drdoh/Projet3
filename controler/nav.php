<?php

  if(isset($_SESSION['admin'])){
    $value = 'Déconnexion';
    $url = 'index.php?action=disconnexion' ;
  }else{
    $value = 'Connexion';
    $url = 'index.php?action=admin' ;
  }
  