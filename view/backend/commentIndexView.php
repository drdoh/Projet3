<?php
ob_start();
?>

<div class="container">
  <br>
  <h1 class="text-center"> INDEX DES COMMENTAIRES </h1>
  <br>
  <div class="row">
                  <div class="col-sm-12 d-flex justify-content-around">
                    <div>
                      <a href="#">
                        <button class="btn btn-outline-success btn-sm ml-1">
                          <i class="fa fa-check" aria-hidden="true"></i>
                          Tout Accepter
                        </button>
                      </a>
                    </div>
                    <div>
                      <a href="#">
                        <button class="btn btn-outline-primary btn-sm ml-1">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                          Tout Modifier
                        </button>
                      </a>
                    </div>
                    <div>
                      <a href="#">
                        <button class="btn btn-outline-warning btn-sm ml-1">
                          <i class="fa fa-times" aria-hidden="true"></i>
                          Tout Rejeter
                        </button>
                      </a>
                    </div>

                    <div>
                      <a href="#">
                        <button class="btn btn-outline-danger btn-sm ml-1">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                          Tout Supprimer
                        </button>
                      </a>
                    </div>
                  </div>
              </div>
              <br>
   <section class="p-0" id="portfolio">
    <div class="container p-0">
        <ul class="list-group">

            <li class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex">
                    <div class="p-2">
                        Voir les commentaires Publiés
                    </div>
                    <div class="ml-auto p-2">
                        <button type="button" class="btn btn-primary btn-sm">
                            Voir <span class="badge badge-light">4</span>
                        </button> 
                    </div>
                </div>
            </li> 
            <li class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex">
                    <div class="p-2">
                        Voir les commentaires Rejetés
                    </div>
                    <div class="ml-auto p-2">
                        <button type="button" class="btn btn-primary btn-sm">
                            Voir <span class="badge badge-light">4</span>
                        </button> 
                    </div>
                </div>
            </li> 

            <li class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex">
                    <div class="p-2">
                        Voir les commentaires Signalés
                    </div>
                    <div class="ml-auto p-2">
                        <button type="button" class="btn btn-primary btn-sm">
                            Voir <span class="badge badge-light">4</span>
                        </button> 
                    </div>
                </div>
            </li> 
            <li class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex">
                    <div class="p-2">
                        Voir tout les commentaires
                    </div>
                    <div class="ml-auto p-2">
                        <button type="button" class="btn btn-primary btn-sm">
                            Voir <span class="badge badge-light">4</span>
                        </button> 
                    </div>
                </div>
            </li> 


       </ul>
    </div>
  </section>
</div>
<?php
$content = ob_get_clean();

require('view/layout.php');
?>
