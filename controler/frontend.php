<?php
require_once('model/Manager.php');
require_once('model/CommentManager.php');
require_once('model/PostManager.php');
require_once('model/AdminManager.php');

function showIndex(){
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $posts= $postManager->getPosts();
    require('view/index-nav-layout.php');
    require('view/frontend/indexView.php');
}

function showAboutMe(){
    require('view/nav-layout.php');
    require('view/footer-layout.php');
    require('view/frontend/aboutmeView.php');
}

function showAdmin(){
    require('view/nav-layout.php');
    require('view/frontend/signinView.php');
}

function allPosts(){
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $posts = $postManager->getAllPosts();
    $post = $posts->fetchAll();
    $posts->closeCursor();
    require('view/nav-layout.php');
    require('view/frontend/postlistView.php');
}

function post(){
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getLastComments($_GET['id']);
    require('view/nav-layout.php');
    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment){

    // verif ... 
    
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $affectedLines = $commentManager->postComment($postId, $author, $comment);
    if($affectedLines === false){
        throw new Exception('Impossible d\'ajouter le commentaire');
    }
    else{
        header('Location: index.php?action=post&id='.$postId);
    }
}

function alertComment($commentId,$postId){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $comment=$commentManager->alertComment($commentId);   
    header('Location: index.php?action=post&id='.$postId);
}

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