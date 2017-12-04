<?php
require_once('model/Autoloader.php');
Autoloader::register();

function allPosts(){
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    require('controler/paging_controler.php');
    $posts = $postManager->getSomePosts($cPage,$perPage);
    require('controler/nav-controler.php');
    require('view/frontend/postlistView.php');
}

function post(){
    // Gestion de l'article
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $post = $postManager->getPost($_GET['id']);
        

    // Gestion des commentaire
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $comments = $commentManager->getLastComments($_GET['id']);
    
    // Gestion de la vue
    require('controler/nav-controler.php');
    require('view/frontend/postView.php');
}