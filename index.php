<?php

require('controler/frontend.php');
require('controler/backend.php');
session_start();

try{
    if(!isset($_SESSION['admin'])==true){
         
        if (isset($_GET['action'])) { 
            switch($_GET['action']){
                
                case "showIndex" : 
                    showIndex();
                    break;
                
                case "post" : 
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        post();

                    }
                    else {
                        throw new Exception('Erreur : aucun identifiant de billet envoyé');

                    }
                    break;
                
                case "addComment" : 
                    if (isset($_GET['id']) && (int) $_GET['id'] > 0){
                        if(!empty($_POST['author']) && !empty($_POST['comment'])) {
                        addComment($_GET['id'],$_POST['author'], $_POST['comment']); 

                        }else{
                        throw new Exception('Erreur : aucun message envoyé');

                        }
                    }else{
                    throw new Exception('Erreur : aucun identifiant de billet envoyé');

                    }
                    break;
                
                case "alertComment" : 

                    alertComment($_GET['commentId'], $_GET['id']);  
                    break;

                case "listAllPosts" : 
                    allPosts();
                    break;
                
                case "admin" : 
                    showAdmin();
                    break;
                
                case "signin" : 
                    signin($_POST['name'],$_POST['password']);  
                    break;
                
                case "aboutme" : 
                    showAboutMe();  
                    break;

                default : 
                    throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }else {
            showIndex();
        }
    }else{
        if (isset($_GET['action'])){
                switch ($_GET['action']){
                    case 'disconnexion': 
                        Header('Location: index.php');
                        stopSession();
                    break;

                    case 'editpost': 
                        editPost($_GET['id']);
                    break;

                    case 'deletepost': 
                        deletePost($_GET['id'],$_GET['chapter']);
                    break;

                    case 'updatepost': 
                        updatePost();
                    break;

                    case 'newpost': 
                        newPost();
                    break;

                    case 'addpost': 
                        addPost($_POST['title'],$_POST['content'],$_POST['chapter'],$_FILES);
                    break;

                    case 'showcomments': 
                        showComments($_GET['id']);
                    break;
                    
                    case 'editcomment': 
                        editComment($_GET['id'],$_GET['postid']);
                    break;
                    
                    case 'deletecomment': 
                        deleteComment($_GET['id'],$_GET['postid']);
                    break;

                    case "savecomment" : 
                        savecomment($_GET['id'], $_POST['author'],$_POST['comment'],$_GET['postid']);
                    break;

                    default: 
                        showBackControleur();
                }
        }else {
            showBackControleur();
        }
    }     
}
catch(Exception $e){
    require('view/frontend/errorView.php');
}

