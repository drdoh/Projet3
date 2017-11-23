
<?php ob_start(); ?>

<div class="container">
    
    <h1>Oups Erreur !</h1>

    <div class="jumbotron">

    <strong>Une erreur est survenue : </strong> </br><?= $e->getMessage()?> </br>Erreur N°<?= $e->getCode()?> à la ligne <?= $e->getLine()?> du fichier <?= $e->getFile()?>

    </div>

    <div class="d-flex justify-content-center">
        <a href="index.php"><button type="button" class="btn btn-primary btn-lg ">Retour à l'acceuil</button></a></div>
    </div>
<?php
$content = ob_get_clean();
require('view/layout.php');
?>
