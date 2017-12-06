<?php ob_start();?>

<div class="container">

  <h1 class="m-4 text-center"> LISTE DES CHAPITRES </h1>
  <p><a href="index.php?action=newpost"><button class="btn btn-primary btn-lg btn-block">Nouveau chapitre</button></a></p>
 
  <section class="p-0" id="portfolio">
    <div class="container p-0">
      <ul class="list-group">
        <?php
        if(!empty($posts)):
        foreach ($posts as $post):
          $extrait = substr(strip_tags($post->content()),0,600);
        ?>
        <li class="list-group-item list-group-item-action flex-column align-items-start">
          <div class="container">
            <div class="row">
              <div class="col-xl-4 col-lg-6 align-self-center">
                <a href="index.php?action=editpost&id=<?=$post->id()?>"><img class="img-fluid" src="<?=$post->img()?>" alt=""></a>
              </div>
              <div class="col-xl-6 col-lg-6">
                  <h3><i class="fa fa-book" aria-hidden="true"></i>Chapitre <?=$post->chapter()?> : <?= $post->title() ?> </h3>
                  <p class="text-justify"><?=$extrait?>...</p>
              </div>
              <div class="col-xl-2 col-lg-12 align-self-center  text-sm-center text-xl-left">
                <div class="d-inline">
                  <a href="index.php?action=editpost&id=<?=$post->id()?>">
                    <button class="btn btn-outline-primary">
                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      Modifier
                    </button>
                  </a>
                </div>
                <div class="d-inline">
                  <a href="index.php?action=deletepost&id=<?=$post->id()?>&chapter=<?=$post->chapter()?>">
                    <button class="btn btn-outline-primary">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                      Supprimer
                    </button>
                  </a>
                </div>
                <div class="d-inline">
                  <a href="index.php?action=showpostcomments&id=<?=$post->id()?>">
                    <button class="btn btn-outline-primary">
                      <i class="fa fa-comments" aria-hidden="true"></i>
                      Commentaires
                    </button>
                  </a>
                </div>
              </div>
            </div>
          </div>     
        </li> 
        <?php endforeach; else: ?>
        <li class="list-group-item list-group-item-action flex-column align-items-start">
          <p>Il n'y a pas encore de chapitre : Lancez vous en cliquant <a href="index.php?action=newpost"> ICI </a></p>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </section>
</div>
<?php
$content = ob_get_clean();
require('view/layout.php');
?>