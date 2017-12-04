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
        
        case 'indexcomment':
            indexComments();
        break;

        case 'listcomment':    
            allComments();
        break;

        case 'listpublishedcomment':
            showFilteredComments('published');
        break;

        case 'listrejectedcomment':
            showFilteredComments('rejected');
        break;

        case 'liststandbycomment':
            showFilteredComments('stand_by');
        break;

        case 'listalertcomment':
            showAlertComments();
        break;
 
        case 'showpostcomments': 
            showPostComments($_GET['id']);
        break;
        
        case 'editcomment': 
            editComment($_GET['id'],$_GET['postid']);
        break;

        case 'acceptcomment': 
            acceptComment($_GET['id']);
        break;
        
        case 'rejectcomment': 
            rejectComment($_GET['id']);
        break;
        
        case 'deletecomment': 
            deleteComment($_GET['id'],$_GET['postid']);
        break;

        case "updateComment" :
            updateComment($_GET['id'], $_POST['author'],$_POST['comment'],$_GET['postid']);
        break;

        case "acceptlistedcomments" : 
       
        if(isset($_GET['id'])) {$_GET['id'] = $_GET['id'];}else{$_GET['id'] = '';}
            acceptListedComment($_GET['page'],$_GET['id'] );
        break;

        case "rejectelistedcomments" : 
        if(isset($_GET['id'])) {$_GET['id'] = $_GET['id'];}else{$_GET['id'] = '';}
            rejectListedComment($_GET['page'],$_GET['id']);
        break;
        
        case "deletelistedcomments" : 
        if(isset($_GET['id'])) {$_GET['id'] = $_GET['id'];}else{$_GET['id'] = '';}
            deleteListedComment($_GET['page'],$_GET['id']);
        break;

        default: 
            allPosts();
    }
}else {
    indexPosts();
}