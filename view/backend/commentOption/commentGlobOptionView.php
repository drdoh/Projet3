<?php
ob_start();
?>
    <div class="col-sm-12 d-flex justify-content-around">
        <div>
            <a href="index.php?action=indexcomment">
                <button class="btn btn-outline-primary btn-sm ml-1">
                <i class="fa fa-home" aria-hidden="true"></i>
                Retour
                </button>
            </a>
        </div>
        <div>
            <a href="index.php?action=acceptcomment">
                <button class="btn btn-outline-success btn-sm ml-1">
                <i class="fa fa-check" aria-hidden="true"></i>
                Tout Accepter
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

<?php
$commentGlobalOption = ob_get_clean();
?>