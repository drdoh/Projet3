<?php 
if(!isset($post)){
    $title='';
    $content='';
    $chapter='';
    $URL='?action=addpost';
    $img='';
}else{
    $title=$post->title();
    $content=$post->content();
    $chapter=$post->chapter();
    $URL='?action=updatepost&id='.$_GET['id'].'';
    $img='<img class="jumbotron" src="'.$post->img().'" style="width:100%;">';
} 

ob_start();

?>
<!-- ///////////////  ARTICLE \\\\\\\\\\\\ -->

<div class ="container">
<p><a href="index.php">Retour à la liste des billets</a></p>
    <h1 class="text-center"> Redigez votre article </h1>

    <div class="container my-auto">
        <form method="post" action="index.php<?=$URL?>" enctype="multipart/form-data">
            <div class="row">
                
                    <div class="form-group col-8" >
                        <label class="h5" for="title">TITRE</label>
                        <input class="form-control" type="text" name="title"value='<?= $title ?>'>
                    </div>

                    <div class="form-group col-4">
                        <label class="h5" for="title">Chapitre n°:</label>
                        <input class="form-control" type="text" name="chapter"value='<?= $chapter ?>'>
                    </div>
                
            </div>

            <br>   

<!-- /////////////// COMMENTAIRE  \\\\\\\\\\\\ -->

            <textarea name="content">   
                <?= $content ?>
            </textarea><br>

            <div class="d-flex justify-content-between">
            
                <button type="submit" class=" col-3 btn btn-primary h-50">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i> Enregistrer
                </button>
                

                <input class=" col-6 btn btn-primary h-50" type="file" name="img"/>
                </div >
                <div class="row">
                    <div class="col-6 mx-auto"><hr>
                        <?=$img?>
                    </div>
                </div>
                
            </div> <br>
        </form>    
    </div>
</div>
<?php
$content = ob_get_clean();

require('view/layout.php');
?>
