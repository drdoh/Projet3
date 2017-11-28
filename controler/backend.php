<?php
require_once('model/Autoloader.php');
Autoloader::register();

function showBackControleur(){
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $datas = $postManager->getAllPosts();
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
    $datas=$postManager->getPost($postId);
    $post = new JeanForteroche\Blog\Model\Post($datas);
    
    require('view/nav-layout.php');
    require('view/backend/postView.php');
}

function deletePost($id,$chapter){
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $postManager->deletePost($id);
    unlink('web/img/portfolio/thumbnails/'.$chapter.'.jpg');   
    header('Location: index.php');
}

function updatePost(){ 
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $postManager->updatePost($_POST['title'],$_POST['content'],$_GET['id']);   
    header('Location: index.php');
}

function addPost($title,$content,$chapter,$imgFiles){
    
    $FileManager = new JeanForteroche\Blog\Model\FileManager();
    $FileManager->upload($imgFiles,$chapter);
    
    $img=pathinfo($imgFiles['img']['name']);
    $imgUrl = 'web/img/portfolio/thumbnails/'.$chapter.'.'.$img['extension'];
    
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $postManager->addPost($title, $content, $chapter,$imgUrl);   
    header('Location: index.php');
}

function checkFiles($imgFiles, $chapter){
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