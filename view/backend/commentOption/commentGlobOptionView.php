<?php
$lastAction = 'page='.$_GET['action'];

if(!isset($_GET['id'])||$_GET['id']==''){
    $retour = 'indexcomment';
    $postId ='';
}else{
    $retour = '';
    $postId = "&id=".$_GET['id'];
}

ob_start();
?>
<div class="row m-4 col-lg-12 d-flex justify-content-around">

    <div class="col-xs-12">
        <a href="index.php?action=<?=$retour?>">
            <button class="btn btn-outline-primary btn-sm ml-1">
            <i class="fa fa-home" aria-hidden="true"></i>
            Retour
            </button>
        </a>
    </div>
    <div class="col-xs-12">
        <a href="index.php?action=acceptlistedcomments&<?=$lastAction?><?=$postId?>">
            <button class="btn btn-outline-success btn-sm ml-1">
            <i class="fa fa-check" aria-hidden="true"></i>
            Tout Accepter
            </button>
        </a>
    </div>

    <div class="col-xs-12">
        <a href="index.php?action=rejectelistedcomments&<?=$lastAction?><?=$postId?>">
            <button class="btn btn-outline-warning btn-sm ml-1">
            <i class="fa fa-times" aria-hidden="true"></i>
            Tout Rejeter
            </button>
        </a>
    </div>
    <div class="col-xs-12">
        <a href="index.php?action=deletelistedcomments&<?=$lastAction?><?=$postId?>">
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