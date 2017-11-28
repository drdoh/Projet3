<?php
ob_start();
?>

<div class="container">

  <h1 class="text-center"> LISTE DES COMMENTAIRES </h1>
  <br>
  
   <section class="p-0" id="portfolio">
    <div class="container p-0">
        <ul class="list-group">

          <?php
          foreach ($datas as $comment) {
          ?>

          <li class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="container">
              <div class="row">
                

                  

                  <div class="col-sm-6">
                      <h3> <?=$comment->author?> </h3>
                      <p><?=$comment->comment?></p>
                  </div>

                  <div class="col-sm-2 align-self-center">
                    <div>
                      <a href="index.php?action=editpost&id=<?=$comment->id?>">
                        <button class="btn btn-outline-primary">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                          Modifier
                        </button>
                      </a>
                    </div>
                    <div>
                      <a href="index.php?action=deletepost&id=<?=$comment->id?>">
                        <button class="btn btn-outline-primary">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                          Supprimer
                        </button>
                      </a>
                    </div>
                    <div>
                      <a href="index.php?action=showcomments&id=<?=$comment->id?>">
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
          ?>
      </ul>
    </div>
  </section>
</div>
<?php
$content = ob_get_clean();

require('view/layout.php');
?>
