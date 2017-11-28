<?php
require_once('model/Autoloader.php');
Autoloader::register();

function allPosts(){
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $datas = $postManager->getAllPosts();
   
    require('view/nav-layout.php');
    require('view/frontend/postlistView.php');
}

function post(){
    // Gestion de l'article
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $datas = $postManager->getPost($_GET['id']);
    $post = new JeanForteroche\Blog\Model\Post($datas);

    // Gestion des commentaire
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $datas = $commentManager->getLastComments($_GET['id']);
    
    // Gestion de la vue
    require('view/nav-layout.php');
    require('view/frontend/postView.php');
}