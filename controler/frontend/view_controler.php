<?php
require_once('model/Autoloader.php');
Autoloader::register();

function showIndex(){
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $datas= $postManager->getLastPosts();
    require('view/index-nav-layout.php');
    require('view/frontend/indexView.php');
}

function showAboutMe(){
    require('controler/nav-controler.php');
    require('view/footer-layout.php');
    require('view/frontend/aboutmeView.php');
}

function showAdmin(){
    require('controler/nav-controler.php');
    require('view/frontend/signinView.php');
}