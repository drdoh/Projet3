
<?php ob_start(); ?>


<h1>Mon super blog !</h1>
<p><a href="index.php?action=post&id=<?=$_GET['id']?>">Retour au billet</a></p>


<h2>Modifier votre commetaire</h2>
<form method="post" action="index.php?action=modifyComment&id=<?=$_GET['id']?>&commentId=<?=$comment['id']?>">
    <p>
        <Label for="author"><strong>Votre nom</strong></Label></br>
        <input type="text" id="author" name="author" value="<?=$comment['author']?>">
    </p>
    <p>
        <Label for="comment" ><strong>Votre message</strong></Label></br>
        <textarea name="comment" id="comment" rows="8" cols="45"><?=$comment['comment']?></textarea>
    </p>
    <p>
        <input type="submit">
    </p>
</form>

<?php
$content = ob_get_clean();
require('template.php');
?>
