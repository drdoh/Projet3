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
    if(isset($postId)&& is_int($postId) && $postId<0){
        $postManager = new JeanForteroche\Blog\Model\PostManager();
        $post=$postManager->getPost($postId);
        
        require('controler/nav-controler.php');
        require('view/backend/postView.php');
    }else{
        throw new Exception('Erreur : aucun id envoyé');
    }
}

function updatePost($title,$content,$chapter,$imgFiles){ 
    verifyTitle($title);
    verifyContent($content);
    verifyChapter($chapter);

    if($imgFiles['img']['name']!= false){
        $FileManager = new JeanForteroche\Blog\Model\FileManager();
        $FileManager->upload($imgFiles,$chapter);
        
        $img=pathinfo($imgFiles['img']['name']);
        $imgUrl = 'web/img/portfolio/thumbnails/'.$chapter.'.'.$img['extension'];
    }

    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $postManager->updatePost($title,$content,$_GET['id'],$chapter);   
    header('Location: index.php');
}

function addPost($title,$content,$chapter,$imgFiles){
        verifyTitle($title);
        verifyContent($content);
        verifyChapter($chapter);

        if(isset($imgFiles)&&($imgFiles['img']['name']!= '')){
            $FileManager = new JeanForteroche\Blog\Model\FileManager();
            $FileManager->upload($imgFiles,$chapter);
            
            $img=pathinfo($imgFiles['img']['name']);
            $imgUrl = 'web/img/portfolio/thumbnails/'.$chapter.'.'.$img['extension'];
        }else{
            $message = '<p class="alert alert-danger"> Vous n\'avez pas selectionner image </p>';
            require('view/backend/postView.php');
        }
        $postManager = new JeanForteroche\Blog\Model\PostManager();
        $postManager->addPost($title, $content, $chapter,$imgUrl);
        
        $message = "Votre chapitre à bien été enregistré";
        header('Location: index.php');    
}

function deletePost($id,$chapter){
    if(isset($chapter)&& is_int($chapter) && $chapter<0){
        if(isset($id)&& is_int($id) && $id<0){
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
        }else{
            throw new Exception('Erreur : Mauvais N° de chapitre envoyé');
        }   
   }else{
        throw new Exception('Erreur : Mauvais id envoyé');
   }
}

function verifyChapter($chapter){
    if(isset($chapter)&&($chapter!='')){
        if(is_numeric($chapter)&&$chapter>0){
            return $chapter;
        }else {
            $message = '<p class="alert alert-danger"> Vous devez inscrire un nombre positif</p>';
            require('view/backend/postView.php');
            die();
        }
    }else{
        $message = '<p class="alert alert-danger"> Vous n\'avez pas indiqué le n° du Chapitre</p>';
        require('view/backend/postView.php');
        die();
    }
}
function verifyTitle($title){
    if(isset($title)&&($title!='')){
        
            return $title;
    }else{
        $message = '<p class="alert alert-danger"> Vous n\'avez pas ecrit de titre</p>';
        require('view/backend/postView.php');
        die();
    }
}
function verifyContent($content){
    if(isset($content)&&($content!='')){
        
            return $content;
    }else{
        $message = '<p class="alert alert-danger"> Vous n\'avez pas rediger de contenu</p>';
        require('view/backend/postView.php');
        die();
    }
}

