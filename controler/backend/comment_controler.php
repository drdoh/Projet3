<?php
require_once('model/Autoloader.php');
Autoloader::register();

/* \\\\\\\\\\\::: COMMENTS CONTROLER ::::///////////: */
function indexComments(){
    //$commentManager = new JeanForteroche\Blog\Model\CommentManager();
    //$datas = $commentManager->getAllComments();
    require('controler/nav-controler.php');
    require('view/backend/commentIndexView.php');
}
function allComments(){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $datas = $commentManager->getAllComments();
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
    header('Location: index.php?action=showcomments&id='.$postId);
}

function editcomment($id, $postId){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $comment=$commentManager->getComment($id);
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $post=$postManager->getPost($postId);
    
    require('controler/nav-controler.php');
    require('view/backend/editCommentView.php');
}

function saveComment($commentId,$author,$comment,$postId){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $commentManager->saveComment($commentId,$author,$comment);   
    header('Location: http://localhost/Projet3/index.php?action=editcomment&id='.$commentId.'&postid='.$postId.'');
}