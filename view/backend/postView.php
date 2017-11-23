<?php 
if(!isset($post)){
    $title='';
    $content='';
    $URL='?action=addpost';
}else{
    $title=htmlspecialchars($post['title']);
    $content=nl2br(htmlspecialchars($post['content']));
    $URL='?action=updatepost&id='.$_GET['id'].'';
}

ob_start();

?>
<br>
<div class ="container">
<p><a href="index.php">Retour à la liste des billets</a></p>
    <h1 class="text-center"> Redigez votre article </h1>
    
    <br>
    <div class="container my-auto">
        <form method="post" action="index.php<?=$URL?>">
            <div class="row ">
                <h2 class="col">
                    <label for="title">TITRE</label>
                    <input type="text" name="title"value='<?= $title ?>'>
                </h2>
            
                <button type="submit" class=" col btn btn-primary h-50">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i> Enregistrer
                </button>
            </div><br>
            <textarea name="content">   
                <?= $content ?>
            </textarea>
        </form>    
    </div>
</div>
<?php
$content = ob_get_clean();

require('view/layout.php');
?>
