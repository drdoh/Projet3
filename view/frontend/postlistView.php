<?php ob_start();?>

<div class="container">

    <h1 class="m-4 text-center"> LISTE DES CHAPITRES </h1>

    <p><a href="index.php">Retour à l'accueil</a></p>

    <section class="p-0" id="portfolio">
        <div class="container p-0">
            <ul class="list-group">
                <?php
                if(!empty($posts)){
                foreach($posts as $post){
                
                $extrait = substr(strip_tags($post->content()),0,600);
                ?>
                <li class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 align-self-center">
                            <a class="portfolio-box" href="index.php?action=post&id=<?=$post->id()?>">
                            <img class="img-fluid" src="<?=$post->img()?>" alt="">
                            </a>
                        </div>
                        <div class="col-xl-8 col-lg-6">
                            <h2>Chapitre <?=$post->chapter()?> : <?=$post->title() ?> </h2>
                            <p class="text-justify"><?=$extrait?> ....</p>
                            <a href="index.php?action=post&id=<?=$post->id()?>">à suivre...</a>                
                        </div>           
                    </div>
                </li> 
                <?php }}else{ ?>
                        <li class="list-group-item list-group-item-action flex-column align-items-start">
                            <p class="col-12">Il n'y a pas encore de chapitre</p>
                        </li>
                <?php } ?>
            </ul>
        </div>
    </section>
</div>

<?php
$content = ob_get_clean();
require('view/layout.php');
?>
