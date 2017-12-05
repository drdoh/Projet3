<?php
require_once('model/Autoloader.php');
Autoloader::register();

function indexPosts(){
    $postManager = new JeanForteroche\Blog\Model\PostManager(); 
    require('controler/paging_controler.php');
    $posts = $postManager->getSomePosts($cPage,$perPage);
    require('controler/nav-controler.php');
    require('view/backend/postlistView.php');
}

function newPost(){
    require('controler/nav-controler.php');
    require('view/backend/postView.php');
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
    if(isset($title) && ($title!='')){
        if(isset($content)&&($content!='')){
            if(isset($chapter)&&($chapter!='')){
                verifChapter($chapter);
                if(isset($imgFiles)&&($imgFiles['img']['name']!= '')){
                    $FileManager = new JeanForteroche\Blog\Model\FileManager();
                    $FileManager->upload($imgFiles,$chapter);
                    
                    $img=pathinfo($imgFiles['img']['name']);
                    $imgUrl = 'web/img/portfolio/thumbnails/'.$chapter.'.'.$img['extension'];
                    
                    $postManager = new JeanForteroche\Blog\Model\PostManager();
                    $postManager->addPost($title, $content, $chapter,$imgUrl);
                    $message = "Votre chapitre à bien été enregistré";

                    require('view/backend/postView.php');    
                }else{
                    $message = '<p class="alert alert-danger"> Vous n\'avez pas selectionner image </p>';
                    require('view/backend/postView.php');
                }
            }else{
                $message = '<p class="alert alert-danger"> Vous n\'avez indiquer le n° du Chapitre</p>';
                require('view/backend/postView.php');
            }
        }else{
            $message = '<p class="alert alert-danger"> Vous n\'avez pas rediger de contenu</p>';
            require('view/backend/postView.php');
        }
    }else{
        $message = '<p class="alert alert-danger"> Vous n\'avez pas ecrit de titre</p>';
        require('view/backend/postView.php');
    }
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

function verifChapter($chapter){
    if(is_numeric($chapter)&&$chapter>0){
        return $chapter;
    }else {
        $message = '<p class="alert alert-danger"> Vous devez inscrire un nombre positif</p>';
        require('view/backend/postView.php');
        die();
    }
}

function verifImg($imgUrl){
    if(is_numeric($imgUrl)&&$imgUrl>0){
        return $imgUrl;
    }else {
        $message = '<p class="alert alert-danger"> Vous devez inscrire un nombre positif</p>';
        require('view/backend/postView.php');
        die();
    }
}