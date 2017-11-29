<?php
  if(isset($_SESSION['admin'])){
    $value = 'Déconnexion';
    $url = 'index.php?action=disconnexion' ;
    $button1='<li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?action=newpost">Nouveau chapitre</a>';
    $button2='<li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?action=indexcomment">Voir les commentaires</a>';
    $button3='<li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?action=editprofil">Mon profil</a>';
    
  }else{
    $value = 'Connexion';
    $url = 'index.php?action=admin' ;
    $button1='<li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?action=aboutme">A Propos</a>';
    $button2='<li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php#last-post">Mes derinieres Aventures</a></li>';
    $button3= '<li class="nav-item"> <a class="nav-link js-scroll-trigger" href="index.php#contact">Contact</a></li>';
  }
  
  $buttonAdmin='<li class="nav-item"> <a class="nav-link js-scroll-trigger" href="'.$url.'">'.$value.'</a></li>';
  
  require('view/nav-layout.php');