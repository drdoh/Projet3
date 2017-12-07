<?php ob_start();?>
<section>
<div class="container">
    <p><a href="index.php">Retour à la liste des chapitres</a></p>
    <div class="row">
        <div class="col-sm ">
            <h2 class="m-4 text-center">Commentaires de <strong><?=$comment->author()?></strong> pour l'article : <?=$post->title()?></h2>
            <div class="container my-auto">

                <form method="post" action="index.php?action=updateComment&amp;id=<?=$comment->id()?>&amp;postid=<?=$post->id()?>">
                    <div class="form-group">
                        <Label class="h5" for="comment" ><strong>Modifiez le message</strong></Label></br>
                        <textarea name="comment" id="comment" rows="8" cols="45"><?=$comment->comment()?></textarea>
                    </div>
                    <div>
                    <button type="submit" class=" col-3 btn btn-primary h-50">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i> Enregistrer
                    </button>   
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</section>
<?php
$content = ob_get_clean();
require('view/layout.php');
?>
