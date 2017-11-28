<?php
require_once('model/Autoloader.php');
Autoloader::register();


function signin($sendName,$sendPassword){
    $adminManager = new JeanForteroche\Blog\Model\AdminManager();
    $password = $adminManager->getPassword($sendName);
    
    if($password===sha1($sendPassword)){
        if(!isset($_SESSION)){
            session_start();
        }else{
            $_SESSION['admin']=true;
            header('Location: index.php');
        }
    }else{
        $message = '<p class="alert alert-danger"> Nom ou mot de passe incorrect ! </p>';
        require('view/frontend/signinView.php');
    }
}