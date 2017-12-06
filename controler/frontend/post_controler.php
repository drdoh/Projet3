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

function post($id){

    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $post = $postManager->getPost($id);
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $comments = $commentManager->getLastPostComments($id);
    require('controler/nav-controler.php');
    require('view/frontend/postView.php');
}