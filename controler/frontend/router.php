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
                    post($_GET['id']);
                    break;

                case "listPosts" : 
                    allPosts();
                    break;

/* -------------- \\\\\\\ COMMENT ////// ----------------- */

                case "addComment" : 
                    addComment($_GET['id'],$_POST['author'], $_POST['comment']); 
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