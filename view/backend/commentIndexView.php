<?php
ob_start();
?>
<div class="container">
    <p class="m-4"><a href="index.php">Retour à la liste des billets</a></p>
    <h1 class="text-center"> INDEX DES COMMENTAIRES </h1>
    <section class="p-0" id="portfolio">
        <div class="container p-0">
            <ul class="list-group">
                <li class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex">
                        <div class="p-2">
                            Voir tout les commentaires
                        </div>
                        <div class="ml-auto p-2">
                            <a href="index.php?action=listcomment">
                                <button type="button" class="btn btn-primary btn-sm">
                                        Voir <span class="badge badge-light"><?=$tab[0]['nbcomment']?></span>
                                </button>
                            </a>
                        </div>
                    </div>
                </li> 
                <li class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex">
                        <div class="p-2">
                            Voir les commentaires publiés
                        </div>
                            <div class="ml-auto p-2">
                                <a href="index.php?action=listpublishedcomment">
                                    <button type="button" class="btn btn-primary btn-sm">
                                        Voir <span class="badge badge-light"><?=$tab[0]['nb_published_comment']?></span>
                                    </button> 
                                </a>
                            </div>
                    </div>
                </li> 
                <li class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex">
                        <div class="p-2">
                            Voir les commentaires Rejetés
                        </div>
                        <div class="ml-auto p-2">
                            <a href="index.php?action=listrejectedcomment">
                                <button type="button" class="btn btn-primary btn-sm">
                                    Voir <span class="badge badge-light"><?=$tab[0]['nb_rejected_comment']?></span>
                                </button> 
                            </a>
                        </div>
                    </div>
                </li> 
                <li class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex">
                        <div class="p-2">
                            Voir les commentaires Signalés
                        </div>
                        <div class="ml-auto p-2">
                            <a href="index.php?action=listalertcomment">
                                <button type="button" class="btn btn-primary btn-sm">
                                    Voir <span class="badge badge-light"><?=$tab[0]['nb_alert_comment']?></span>
                                </button> 
                            </a>
                        </div>
                    </div>
                </li> 
                <li class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex">
                        <div class="p-2">
                            Voir les commentaires en attente de validation
                        </div>
                        <div class="ml-auto p-2">
                            <a href="index.php?action=liststandbycomment">
                                <button type="button" class="btn btn-primary btn-sm">
                                    Voir <span class="badge badge-light"><?=$tab[0]['nb_stand_by_comment']?></span>
                                </button>
                            </a>
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
