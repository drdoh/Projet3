<?php
/* ::::::::::: \\\\\\\\\\\\\ BACKEND ROUTER ///////////// ::::::::::: */

require('controler/backend/admin_controler.php');
require('controler/backend/comment_controler.php');
require('controler/backend/post_controler.php');


if (isset($_GET['action'])){
    switch ($_GET['action']){

    /* -------------- \\\\\\\ ADMIN ////// ----------------- */  
        case 'disconnexion': 
            Header('Location: index.php');
            stopSession();
        break;
    /* -------------- \\\\\\\ POST////// ----------------- */ 
        case 'editpost': 
            editPost($_GET['id']);
        break;

        case 'deletepost': 
            deletePost($_GET['id'],$_GET['chapter']);
        break;

        case 'updatepost': 
            updatePost($_POST['title'],$_POST['content'],$_POST['chapter'],$_FILES);
        break;

        case 'newpost': 
            newPost();
        break;

        case 'addpost': 
            addPost($_POST['title'],$_POST['content'],$_POST['chapter'],$_FILES);
        break;
    /* -------------- \\\\\\\ COMMENT ////// ----------------- */ 
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