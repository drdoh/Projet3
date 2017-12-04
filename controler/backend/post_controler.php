<?php
require_once('model/Autoloader.php');
Autoloader::register();

function indexPosts(){
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    require('controler/paging_controler.php');
    $perPage = 5;
    $cPage = pagingPost($postManager, $perPage);
    $datas = $postManager->getFivePosts($cPage,$perPage);
    require('controler/nav-controler.php');
    require('view/backend/postlistView.php');
}

function newPost(){
    require('controler/nav-controler.php');
    require('view/backend/postView.php');
}

function allPosts(){
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $datas = $postManager->getAllPosts();
    require('controler/nav-controler.php');
    require('view/backend/postlistView.php');
}

function editPost($postId){
    // VERIF 
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $post=$postManager->getPost($postId);
    
    require('controler/nav-controler.php');
    require('view/backend/postView.php');
}

function updatePost($title,$content,$chapter,$imgFiles){ 
    // VERIF 
    if($imgFiles['img']['name']!= false){
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
    // VERIF 
    $FileManager = new JeanForteroche\Blog\Model\FileManager();
    $FileManager->upload($imgFiles,$chapter);
    
    $img=pathinfo($imgFiles['img']['name']);
    $imgUrl = 'web/img/portfolio/thumbnails/'.$chapter.'.'.$img['extension'];
    
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $postManager->addPost($title, $content, $chapter,$imgUrl);   
    header('Location: index.php');
}

function deletePost($id,$chapter){
    // VERIF 
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $postManager->deletePost($id);
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $commentManager->deletePostComment($id);
    if(file_exists('web/img/portfolio/thumbnails/'.$chapter.'.jpg')){
        unlink('web/img/portfolio/thumbnails/'.$chapter.'.jpg');   
    }
    if(file_exists('web/img/portfolio/fullsize/'.$chapter.'.jpg')){
        unlink('web/img/portfolio/fullsize/'.$chapter.'.jpg');   
    }
    header('Location: index.php');
}