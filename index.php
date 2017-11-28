<?php


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

