<?php
require_once('model/Autoloader.php');
Autoloader::register();

function addComment($postId, $author, $comment){
    verifyAuthor($author,$postId);
    verifyComment($comment,$postId);

    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $affectedLines = $commentManager->addComment($postId, $author, $comment);
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $post=$postManager->getPost($postId);
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $comments = $commentManager->getLastPostComments($postId);
    $message = '<p class="alert alert-success">Votre commentaire a bien été envoyé !</p>';
    require('controler/nav-controler.php');
    require('view/frontend/postView.php');
}
    
function alertComment($commentId,$postId){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $comment=$commentManager->alertComment($commentId);   
    header('Location: index.php?action=post&id='.$postId);
}

function verifyAuthor($author,$postId){
    if(isset($author)&&($author!='')){
        
            return $author;
    }else{
        $postManager = new JeanForteroche\Blog\Model\PostManager();
        $post=$postManager->getPost($postId);
        $commentManager = new JeanForteroche\Blog\Model\CommentManager();
        $comments = $commentManager->getLastPostComments($postId);
        $message = '<p class="alert alert-danger"> Vous n\'avez pas inscrit votre nom</p>';
        require('controler/nav-controler.php');
        require('view/frontend/postView.php');
        die();
    }
}
function verifyComment($comment,$postId){
    if(isset($comment)&&($comment!='')){
        
            return $comment;
    }else{
        $postManager = new JeanForteroche\Blog\Model\PostManager();
        $post=$postManager->getPost($postId);
        $commentManager = new JeanForteroche\Blog\Model\CommentManager();
        $comments = $commentManager->getLastPostComments($postId);
        $message = '<p class="alert alert-danger"> Vous n\'avez pas ecrit de message</p>';
        require('controler/nav-controler.php');
        require('view/frontend/postView.php');
        die();
    }
}