<?php
ob_start();
?>

<div class="container">
  <br>
  <h1 class="text-center"> <?= $title?> </h1>
  <br>
  <div class="row">
                  <div class="col-sm-12 d-flex justify-content-around">
                    <div>
                      <a href="index.php?action=indexcomment">
                        <button class="btn btn-outline-primary btn-sm ml-1">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                          Retour
                        </button>
                      </a>
                    </div>
                    <div>
                      <a href="#">
                        <button class="btn btn-outline-success btn-sm ml-1">
                          <i class="fa fa-check" aria-hidden="true"></i>
                          Tout Accepter
                        </button>
                      </a>
                    </div>
                    <div>
                      <a href="#">
                        <button class="btn btn-outline-warning btn-sm ml-1">
                          <i class="fa fa-times" aria-hidden="true"></i>
                          Tout Rejeter
                        </button>
                      </a>
                    </div>

                    <div>
                      <a href="#">
                        <button class="btn btn-outline-danger btn-sm ml-1">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                          Tout Supprimer
                        </button>
                      </a>
                    </div>
                  </div>
              </div>
              <br>
   <section class="p-0" id="portfolio">
    <div class="container p-0">
        <ul class="list-group">

          <?php
          foreach ($datas as $comment) {
            
            switch($comment){
              case $comment->alert != 0:
                $status='<span class="badge badge-warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Signalement : '.$comment->alert.'</span>';
                break;
              case $comment->stand_by != 0:
                $status='<span class="badge badge-info"><i class="fa fa-info-circle" aria-hidden="true"></i> En attente </span>';
                break;
              case $comment->published != 0:
                $status='<span class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i> Publié </span>';
                break;
              case $comment->rejected != 0:
                $status='<span class="badge badge-danger"><i class="fa fa-times" aria-hidden="true"></i> Rejeté</span>';
                break;

              default :
                $status='';
            }
          ?>

          <li class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="container">
              <div class="row">
                  <div class="col-sm-2 align-self-center">
                    <?=$status?>
                  </div>
          
                  <div class="col-sm-10">
                      <h3> <?=$comment->author?> </h3><em>le <?=$comment->comment_date ?></em>
                      <p><?=$comment->comment?></p>
                  </div>

              </div>

              <div class="row">
                  <div class="col-sm-12 d-flex justify-content-end">
                    <div>
                      <a href="index.php?action=acceptcomment&id=<?=$comment->id?>&page=<?= $_GET['action']?>">
                        <button class="btn btn-success btn-sm ml-1">
                          <i class="fa fa-check" aria-hidden="true"></i>
                          Accepter
                        </button>
                      </a>
                    </div>
                    <div>
                      <a href="index.php?action=editcomment&id=<?= $comment->id ?>&postid=<?= $comment->post_id ?>&page=<?= $_GET['action']?>">
                        <button class="btn btn-primary btn-sm ml-1">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                          Modifier
                        </button>
                      </a>
                    </div>
                    <div>
                      <a href="index.php?action=rejectcomment&id=<?= $comment->id ?>&page=<?= $_GET['action']?>">
                        <button class="btn btn-warning btn-sm ml-1">
                          <i class="fa fa-times" aria-hidden="true"></i>
                          Rejeter
                        </button>
                      </a>
                    </div>

                    <div>
                      <a href="index.php?action=deletecomment&id=<?= $comment->id ?>&postid=<?= $comment->post_id ?>&page=<?= $_GET['action']?>">
                        <button class="btn btn-danger btn-sm ml-1">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                          Supprimer
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
