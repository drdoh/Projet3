<?php ob_start(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm ">
            <br>
            <h2>Commentaires de l'article : <?=$post['title']?></h2>
            <br>
            <p><a href="index.php">Retour à la liste des billets</a></p>
            <ul class="list-group">

            <?php
            if(!empty($comments)){
                 foreach($comments as $comment) {
                    
                    if($comment->alert != 0){
                        $html='<span class="badge badge-warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Signalement : '.$comment->alert.'</span>';                               
                    }else{
                        $html='';
                    }                  
            ?>
                <li class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="row ">
                        <div class="col-6">
                            <p><strong><?= $comment->author ?></strong> le <?= $comment->comment_date_fr ?></p>
                            <p><?= $comment->comment ?> </p>
                        </div>
                        <div class="col-2 align-self-center">
                            <?=$html?>
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
                </li>

            <?php }}else{ ?>
                <li class="list-group-item list-group-item-action flex-column align-items-start"><p>Il n'y a pas de commentaire pour cette article</p></li>
           <?php } // Fin de la boucle?>

            </ul>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean();
require('view/layout.php');
?>
