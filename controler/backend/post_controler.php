<?php
require_once('model/Autoloader.php');
Autoloader::register();

function editPost($postId){
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $datas=$postManager->getPost($postId);
    $post = new JeanForteroche\Blog\Model\Post($datas);
    
    require('controler/nav-controler.php');
    require('view/backend/postView.php');
}

function deletePost($id,$chapter){
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $postManager->deletePost($id);
    if(file_exists('web/img/portfolio/thumbnails/'.$chapter.'.jpg')){
        unlink('web/img/portfolio/thumbnails/'.$chapter.'.jpg');   
    }
    if(file_exists('web/img/portfolio/fullsize/'.$chapter.'.jpg')){
        unlink('web/img/portfolio/fullsize/'.$chapter.'.jpg');   
    }
    header('Location: index.php');
}

function updatePost($title,$content,$chapter,$imgFiles){ 
    if($imgFiles['img']['name']!= ''){
        $FileManager = new JeanForteroche\Blog\Model\FileManager();
        $FileManager->upload($imgFiles,$chapter);
    
        $img=pathinfo($imgFiles['img']['name']);
        $imgUrl = 'web/img/portfolio/thumbnails/'.$chapter.'.'.$img['extension'];
    }
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

function newPost(){
    require('view/nav-layout.php');
    require('view/backend/postView.php');
}
