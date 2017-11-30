<?php
require_once('model/Autoloader.php');
Autoloader::register();

function allPosts(){
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $posts = $postManager->getAllPosts();
   
    require('controler/nav-controler.php');
    require('view/frontend/postlistView.php');
}

function post(){
    // Gestion de l'article
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $post = $postManager->getPost($_GET['id']);
        

    // Gestion des commentaire
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $datas = $commentManager->getLastComments($_GET['id']);
    
    // Gestion de la vue
    require('controler/nav-controler.php');
    require('view/frontend/postView.php');
}