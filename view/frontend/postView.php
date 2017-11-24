
<?php
var_dump($post->id());

 ob_start();?>

<div class="container my-auto">
    <h1><?= $post->title() ?></h1>
    <p><a href="index.php?action=listAllPosts">Retour à la liste des billets</a></p>

    <div>
        <h6>
            <em> <?= $post->creation_date() ?></em>
        </h6>
        
        <div class="content" >
            <?= $post->content() ?>
        </div>
    </div>

    <hr class="my-4">

<div class="container">
  <div class="row">
    <div class="col-sm ">
        <h2>Commentaires</h2>

        <?php
        var_dump($comment);
        foreach($comment as $datas){
        ?>
            <div class="p-2 border  border-warning rounded">
                <p ><strong><?= $datas['author'] ?></strong> le <?= $datas['comment_date_fr'] ?> <em>(<a href="index.php?action=alertComment&id=<?=$post['id']?>&commentId=<?=$datas['id']?>">Signalé</a>)</em></p>
                <hr class="light">
                <p><?= nl2br($datas['comment']) ?> </p>
                <!-- MODIFIER LA RECUPERATION DES DONNEES !!! -->
            </div>
            <br>
        <?php
        } 
        ?>
    </div>

    
    <div class="col-sm">
        <h2>Laissez votre commetaire</h2>
        <form method="post" action="index.php?action=addComment&amp;id=<?=$post->id()?>">
            <p>
                <Label for="author"><strong>Votre nom</strong></Label></br>
                <input type="text" id="author" name="author">
            </p>
            <p>
                <Label for="comment" ><strong>Votre message</strong></Label></br>
                <textarea name="comment" id="comment" rows="8" cols="45"></textarea>
            </p>
            <p>
                <input type="submit">
            </p>
        </form>
    </div>
  </div>
</div>

<?php
$content = ob_get_clean();
var_dump($content);
require('view/layout.php');
?>