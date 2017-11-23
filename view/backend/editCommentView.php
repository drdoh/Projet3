<?php ob_start();?>

<div class="container">
    <div class="row">
        <div class="col-sm ">

            <h2>Commentaires de <strong><?=$comment['author']?></strong> pour l'article : <?=$post['title']?></h2>

            <form method="post" action="index.php?action=savecomment&amp;id=<?=$comment['id']?>&amp;postid=<?=$post['id']?>">
            <p>
                <Label for="author"><strong>Modifier le nom</strong></Label></br>
                <input type="text" id="author" name="author" value="<?=$comment['author']?>">
            </p>
            <p>
                <Label for="comment" ><strong>Modifier le message</strong></Label></br>
                <textarea name="comment" id="comment" rows="8" cols="45"><?=$comment['comment']?></textarea>
            </p>
            <p>
                <input value= "enregistrer" type="submit">
            </p>
        </form>
        </div>
    </div>
</div>


<?php


$content = ob_get_clean();
require('view/layout.php');
?>
