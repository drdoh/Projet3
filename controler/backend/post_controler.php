<?php
require_once('model/Autoloader.php');
Autoloader::register();


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
