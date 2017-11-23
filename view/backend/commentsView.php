<?php ob_start(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm ">

            <h2>Commentaires de l'article : <?=$post['title']?></h2>

            <ul class="list-group">

            <?php
                 while ($comment = $comments->fetch()) {
            ?>
                <li class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="row">
                        <div class="col-6">
                            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
                            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?> </p>
                        </div>
                       
                        <div class="col-2">
                            <span class="badge badge-warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Signalement</span>
                        </div>

                        <div class="col-2">
                            <div>
                                <a href="index.php?action=editcomment&id=<?=$comment["id"]?>&postid=<?=$_GET['id']?>">
                                    <button class="btn btn-outline-primary">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    Modifier
                                    </button>
                                </a>
                            </div>
                        </div>

                        <div class="col-2">
                            <div>
                                <a href="index.php?action=deletecomment&id=<?=$comment["id"]?>&postid=<?=$_GET['id']?>">
                                    <button class="btn btn-outline-primary">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                    Supprimer
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>

            <?php } // Fin de la boucle?>

            </ul>
        </div>
    </div>
</div>


<?php
$comments->closeCursor();

$content = ob_get_clean();
require('view/layout.php');
?>
