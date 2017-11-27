<?php
require_once('model/Autoloader.php');
Autoloader::register();

function showBackControleur(){
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $posts = $postManager->getAllPosts();
    require('view/nav-layout.php');
    require('view/backend/postlistView.php');
}
/* \\\\\\\\\\\::: SESSION CONTROLER ::::///////////: */
function stopSession(){
    session_destroy();
    require('view/nav-layout.php');
    require('view/frontend/indexView.php');
}

/* \\\\\\\\\\\::: POSTS CONTROLER ::::///////////: */

function editPost($postId){
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $post=$postManager->getPost($postId);
    require('view/nav-layout.php');
    require('view/backend/postView.php');
}

function deletePost($id){
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $postManager->deletePost($id);   
    header('Location: index.php');
}

function updatePost(){ 
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $postManager->updatePost($_POST['title'],$_POST['content'],$_GET['id']);   
    header('Location: index.php');
}

function addPost($title,$content){
    
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $postManager->addPost($title,$content);   
    header('Location: index.php');
}

function newPost(){
    require('view/nav-layout.php');
    require('view/backend/postView.php');
}


/* \\\\\\\\\\\::: COMMENTS CONTROLER ::::///////////: */

function showComments($postId){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $comments=$commentManager->getAllComments($postId);
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $post=$postManager->getPost($postId);
    require('view/nav-layout.php');
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
    
    require('view/nav-layout.php');
    require('view/backend/editCommentView.php');
}

function saveComment($commentId,$author,$comment,$postId){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $commentManager->saveComment($commentId,$author,$comment);   
    header('Location: http://localhost/Projet3/index.php?action=editcomment&id='.$commentId.'&postid='.$postId.'');
}