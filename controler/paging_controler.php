<?php
require_once('model/Autoloader.php');
Autoloader::register();


$perPage = 5;    
$nbPosts = $postManager->countPosts();

$nbPage= ceil($nbPosts['nbposts']/$perPage);

if(isset($_GET['p'])&& $_GET['p']>0 && $_GET['p']<=$nbPage){
    $cPage = $_GET['p'];
}else{
    $cPage = 1;
}


for($i=1 ; $i<=$nbPage ; $i++){
    if($i==$cPage){
        $pagingBtns[] = array(
            "link" => " <a class=\"page-link\" href=\"\"> $i </a> ",
            "class"=>"active"
        );
    }else{
        $pagingBtns[] = array(
            "link" =>" <a class=\"page-link\" href=\"index.php?action=listPosts&p=$i\">$i</a> ",
            "class"=>""
        );
    }
}

require('view/paging-layout.php');
