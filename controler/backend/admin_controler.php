<?php
require_once('model/Autoloader.php');
Autoloader::register();

function showBackControleur(){
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $datas = $postManager->getAllPosts();
    require('controler/nav-controler.php');
    require('view/backend/postlistView.php');
}
/* \\\\\\\\\\\::: SESSION CONTROLER ::::///////////: */
function stopSession(){
    session_destroy();
    require('controler/nav-controler.php');
    require('view/frontend/indexView.php');
}