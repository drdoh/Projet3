
<?php
 ob_start();?>

<!-- POST ZONE -->
<div class="container my-auto">
    <h1><?= $post->title()?></h1>
    <p><a href="index.php?action=listPosts">Retour à la liste des billets</a></p>

    <div>
        <h6> <em> <?= $post->creation_date() ?></em> </h6>
        
        <div class="content" >
            <?= $post->content() ?>
        </div>
    </div>

    <hr class="my-4">
    
<!-- CONTACT ZONE -->
    <div class="container">
        <div class="row">
        <!-- LEFT COLLUMN -->
            <div class="col-sm">
                <h2>Commentaires</h2>
                <?php foreach($comments as $comment):?>
                    <div class="p-2 border  border-warning rounded">
                        <p ><strong><?= $comment->author() ?></strong> le <?= $comment->comment_date() ?> <em>(<a href="index.php?action=alertComment&id=<?=$post->id()?>&commentId=<?=$comment->id()?>">Signalé</a>)</em></p>
                        <hr class="light">
                        <p><?= nl2br($comment->comment()) ?> </p>
                    </div><br>
                <?php endforeach;?>
            </div>

        <!-- RIGHT COLLUMN -->    
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
require('view/layout.php');
?>