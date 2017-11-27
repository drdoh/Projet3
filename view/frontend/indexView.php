<?php 
      
    include 'view/layout.php';
    
?>

<!-- ______________************* ZONE PAGE D'ACCUEIL ****************________ -->

<header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row jumbotron">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-capitalize">
              <strong>Billet simple pour l'Alaska</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="mb-5">Blog de l'acteur et écrivain Jean Forteroche</p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#last-post">Voir plus ...</a>
          </div>
        </div>
      </div>
    </header>

    <section id="last-post">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-capitalize">Mes derniers exploits</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>  
    </section>

<!-- ______________************* ZONE DES 6 DERNIERS ARTICLES ****************________ -->

    <section class="p-0" id="portfolio">
      <div class="container-fluid p-0">
        <div class="row no-gutters">
          
<?php
    foreach($datas as $post){   
?>
        <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="index.php?action=post&id=<?=$post->id?>">
              <img class="img-fluid" src="web/img/portfolio/thumbnails/<?=$post->chapter?>.jpg" >
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    <?=$post->title?>
                  </div>
                  <div class="project-name">
                    Chapitre <?=$post->chapter?> : <?=$post->title?>
                  </div>
                </div>
              </div>
            </a>
          </div>
    <?php
    } ?>
        </div>
      </div>
    </section>
    <br/>
    <div class="d-flex justify-content-center">
    <a href="index.php?action=listAllPosts"><button type="button" class="btn btn-primary btn-lg ">  Cliquez ici pour retrouver l'intégralité des chapitres ...</button></a> 
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