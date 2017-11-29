<?php

/* ::::::::::: \\\\\\\\\\\\\ FRONTEND ROUTER ///////////// ::::::::::: */

require('controler/frontend/admin_controler.php');
require('controler/frontend/comment_controler.php');
require('controler/frontend/post_controler.php');
require('controler/frontend/view_controler.php');

if (isset($_GET['action'])) { 
            switch($_GET['action']){

/* -------------- \\\\\\\ ADMIN ////// ----------------- */                 

                case "admin" : 
                    showAdmin();
                    break;

                case "signin" : 
                    signin($_POST['name'],$_POST['password']);  
                    break;

/* -------------- \\\\\\\ VIEW ////// ----------------- */  

                case "showIndex" : 
                    showIndex();
                    break;
                
                case "aboutme" : 
                    showAboutMe();  
                    break;   

/* -------------- \\\\\\\ POST////// ----------------- */

                case "post" : 
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        post();

                    }
                    else {
                        throw new Exception('Erreur : aucun identifiant de billet envoyé');

                    }
                    break;

                case "listAllPosts" : 
                    allPosts();
                    break;

    /* -------------- \\\\\\\ COMMENT ////// ----------------- */   

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

                default : 
                    throw new Exception('La page demandée n\'existe pas');
            }
        }else {
            showIndex();
        }