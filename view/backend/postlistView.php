
<?php require('view/layout.php'); ?>
<br>
<div class="container">

  <h1 class="text-center"> LISTE DES CHAPITRES </h1>
  <br>
  
  <a href="index.php?action=newpost"><button class="btn btn-primary btn-lg btn-block">Nouveau chapitre</button></a>
  <br>

  <section class="p-0" id="portfolio">
    <div class="container p-0">
        <ul class="list-group">

          <?php // BOUCLE + RECUPERATION DE L'EXTRAIT 
          while ($data = $posts->fetch()) {
          $extrait = substr($data['content'],0,500);
          ?>

          <li class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="container">
              <div class="row">
                

                  <div class="col-sm-4 align-self-center">
                    <a href="index.php?action=editpost&id=<?=$data['id']?>"><img class="img-fluid" src="web/img/portfolio/thumbnails/<?=$data['chapter']?>.jpg" alt=""></a>
                  </div>

                  <div class="col-sm-6">
                      <h3><i class="fa fa-book" aria-hidden="true"></i>Chapitre <?=$data['chapter']?> : <?= htmlspecialchars($data['title']) ?> </h3>
                      <p><?=htmlspecialchars($extrait)?>...</p>
                  </div>

                  <div class="col-sm-2 align-self-center">
                    <div>
                      <a href="index.php?action=editpost&id=<?=$data['id']?>">
                        <button class="btn btn-outline-primary">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                          Modifier
                        </button>
                      </a>
                    </div>
                    <div>
                      <a href="index.php?action=deletepost&id=<?=$data['id']?>">
                        <button class="btn btn-outline-primary">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                          Supprimer
                        </button>
                      </a>
                    </div>
                    <div>
                      <a href="index.php?action=showcomments&id=<?=$data['id']?>">
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
          <?php
          }
          $posts->closeCursor();            
          ?>
      </ul>
    </div>
  </section>
</div>
