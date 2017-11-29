<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

session_start();

try{
    if(!isset($_SESSION['admin'])==true){
         require('controler/frontend/router.php');
       
    }else{
        require('controler/backend/router.php');
    }     
}
catch(Exception $e){
    require('view/frontend/errorView.php');
}

