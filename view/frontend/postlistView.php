<div class="container">
<h1 class="text-center"> LISTE DES CHAPITRES </h1>
<p><a href="index.php">Retour à l'accueil</a></p>
    <div class="">
<!-- ______________************* ZONE DES 6 DERNIERS ARTICLES ****************________ -->

    <section class="p-0" id="portfolio">
      <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">
          <ul class="list-group">
            <?php
            foreach($post as $datas){
            
            $extrait = substr( htmlspecialchars($datas['content']),0,600);
            ?>
            <li class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="row">
                    <div class="col-6">
                        <a class="portfolio-box" href="index.php?action=post&id=<?=$datas['id']?>">
                        <img class="img-fluid" src="<?=$datas['img']?>" alt="">
                        </a>
                    </div>
                    <div class="col-6">
                        <h2>Chapitre <?=$datas['chapter']?> : <?=$datas['title'] ?> </h2>
                        <div><?=$extrait?> ....</div>
                        <a href="index.php?action=post&id=<?=$datas['id']?>" >à suivre...</a>                
                    </div>           
                </div>
            </li> 
            <?php
            }            
            ?>
            </ul>
        </div>
      </div>
    </section>

</div>
</div>
<!-- ______________************* ZONE DE CONTACT ****************________ -->

    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Contactez moi !</h2>
            <hr class="my-4">
            <p class="mb-5">Je vous répondrais peut-être ...</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
            <p>01-02-03-04-05</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="mailto:your-email@your-domain.com">feedback@jean-forteroche.com</a>
            </p>
          </div>
        </div>
      </div>
    </section>

<?php require('view/layout.php'); ?>