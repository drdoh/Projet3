
<?php   ob_start();
        require('view/nav-layout.php'); 
        require('view/footer-layout.php'); ?>

<div class="container">
    <section>
        <h1 class="text-center mb-5">Oups Erreur !</h1>

        <div class="jumbotron">
            <strong>Une erreur est survenue : </strong> <?= $e->getMessage()?> 
        </div>

        <div class="d-flex justify-content-center">
            <a href="index.php"><button type="button" class="btn btn-primary btn-lg ">Retour à l'acceuil</button></a></div>
        </div>
    </section>
</div>
<?php
$content = ob_get_clean();
require('view/layout.php');
?>
