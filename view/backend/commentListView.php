<?php
ob_start();
require('view/backend/commentOption/commentGlobOptionView.php');
?>

<div class="container">

  <h1 class="m-4 text-center"> <?= $title?> </h1>
  <div class="row">
    <?=$commentGlobalOption;?>      
  </div>
  <section class="p-0" id="portfolio">
    <div class="container p-0">
        <ul class="list-group">
          <?php
          if(!empty($comments)):
          foreach ($comments as $comment):
            require('controler/backend/commentStatus.php');
            require('view/backend/commentOption/commentIndivOptView.php');
          ?>
            <li class="list-group-item list-group-item-action flex-column align-items-start">
              <div class="container">
                <div class="row">
                  <div class="col-sm-2 align-self-center">
                    <?=$status?>
                  </div>         
                  <div class="col-sm-10">
                    <h3> <?=$comment->author()?> </h3><em>le <?=$comment->comment_date() ?></em>
                    <p><?=$comment->comment()?></p>
                  </div>
                </div>
                <div class="row">
                  <?=$commentOption;?>
                </div>
              </div>     
            </li> 
          <?php endforeach; else: ?>
            <li class="list-group-item list-group-item-action flex-column align-items-start">
              <p>Il n'y a pas de commentaire</p>
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
