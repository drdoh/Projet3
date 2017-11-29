<?php
require_once('model/Autoloader.php');
Autoloader::register();

/* \\\\\\\\\\\::: COMMENTS CONTROLER ::::///////////: */
function indexComments(){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $nbComments = $commentManager->countComments();
    $nbRejectedComments = $commentManager->countRejectedComments();
    $nbAlertComments = $commentManager->countAlertComments();
    $nbStandByComments = $commentManager->countStandByComments();
    $nbPublishedComments = $commentManager->countPublishedComments();
    $tab = array_replace_recursive($nbComments,$nbRejectedComments,$nbAlertComments,$nbStandByComments,$nbPublishedComments);
   
    require('controler/nav-controler.php');
    require('view/backend/commentIndexView.php');
}

function allComments(){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $datas = $commentManager->getAllComments();
    $title="Tout les commentaires";
    require('controler/nav-controler.php');
    require('view/backend/commentListView.php');
}

function showPublishedComments(){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $datas = $commentManager->getPublishedComments();
    $title="Commentaires publiés";
    require('controler/nav-controler.php');
    require('view/backend/commentListView.php');
}

function showRejectedComments(){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $datas = $commentManager->getRejectedComments();
    $title="Commentaires Rejetés";
    require('controler/nav-controler.php');
    require('view/backend/commentListView.php');
}

function showAlertComments(){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $datas = $commentManager->getAlertComments();
    $title="Commentaires signalés";
    require('controler/nav-controler.php');
    require('view/backend/commentListView.php');
}

function showStandbyComments(){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $datas = $commentManager->getStandByComments();
    $title="Commentaires en attente de validation";
    require('controler/nav-controler.php');
    require('view/backend/commentListView.php');
}

function showPostComments($postId){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $comments=$commentManager->getPostComments($postId);
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $post=$postManager->getPost($postId);
    require('controler/nav-controler.php');
    require('view/backend/commentsView.php');
}

function deletecomment($id, $postId){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $commentManager->deleteComment($id);   
    header('Location: index.php?action='.$_GET['page']);
}

function editcomment($id, $postId){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $comment=$commentManager->getComment($id);
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $post=$postManager->getPost($postId);
    
    require('controler/nav-controler.php');
    require('view/backend/editCommentView.php');
}

function acceptComment($id){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $comment=$commentManager->acceptComment($id);
    header('Location: index.php?action='.$_GET['page']);
}

function rejectComment($id){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $comment=$commentManager->rejetComment($id);
    header('Location: index.php?action='.$_GET['page']);
}

function saveComment($commentId,$author,$comment,$postId){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $commentManager->saveComment($commentId,$author,$comment);   
    header('Location: http://localhost/Projet3/index.php?action=editcomment&id='.$commentId.'&postid='.$postId.'');
}