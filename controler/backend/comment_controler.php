<?php
require_once('model/Autoloader.php');
Autoloader::register();

/* \\\\\\\\\\\::: COMMENTS CONTROLER :::://///////// */

function indexComments(){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $nbComments = $commentManager->countComments();
    $nbAlertComments = $commentManager->countAlertComments();
    $nbRejectedComments = $commentManager->countFilteredComments('rejected');
    $nbStandByComments = $commentManager->countFilteredComments('stand_by');
    $nbPublishedComments = $commentManager->countFilteredComments('published');
    $tab = array_replace_recursive($nbComments,$nbRejectedComments,$nbAlertComments,$nbStandByComments,$nbPublishedComments);
   
    require('controler/nav-controler.php');
    require('view/backend/commentIndexView.php');
}

function allComments(){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $comments = $commentManager->getAllComments();
    $title="Tout les commentaires";
    require('controler/nav-controler.php');
    require('view/backend/commentListView.php');
}

function showAlertComments(){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $comments = $commentManager->getAlertComments();
    $title="Commentaires signalés";
    require('controler/nav-controler.php');
    require('view/backend/commentListView.php');
}

function showFilteredComments($filter){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $comments = $commentManager->getFilteredComments($filter);
    
    switch($filter){
        case 'published':
        $title="Commentaires publiés";
        break;
        case 'rejected':
        $title="Commentaires Rejetés";
        break;
        case 'stand_by':
        $title="Commentaires en attente de validation";
        break;
        default:
        $title=""; 
        break;
    }
    require('controler/nav-controler.php');
    require('view/backend/commentListView.php');
}

function showPostComments($postId){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $comments=$commentManager->getPostComments($postId);
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $post=$postManager->getPost($postId);
    require('controler/nav-controler.php');
    require('view/backend/commentsView.php');
}

function deletecomment($id, $postId){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $commentManager->deleteComment($id);   
    header('Location: index.php?action='.$_GET['page']);
}

function deleteFilteredComment($filter){
    // $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    // $commentManager->deleteComment($id);   
    // header('Location: index.php?action='.$_GET['page']);
}

function editcomment($id, $postId){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $comment=$commentManager->getComment($id);
    $postManager = new JeanForteroche\Blog\Model\PostManager();
    $post=$postManager->getPost($postId);
    
    require('controler/nav-controler.php');
    require('view/backend/editCommentView.php');
}

function acceptComment($id){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $comment=$commentManager->acceptComment($id);
    header('Location: index.php?action='.$_GET['page']);
}

function acceptFilteredComment($filter){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $comments = $commentManager->getFilteredComments($filter);
    foreach($comments as $comment){
        $comment=$commentManager->acceptComment($comments->id());
    }
    //header('Location: index.php?action='.$_GET['page']);
}

function rejectComment($id){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $comment=$commentManager->rejetComment($id);
    header('Location: index.php?action='.$_GET['page']);
}

function rejectFilteredComment($filter){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $comments = $commentManager->getFilteredComments($filter);
    foreach($comments as $comment){
        $comment=$commentManager->rejetComment($comments->id());
    }
   // header('Location: index.php?action='.$_GET['page']);
}

function updateComment($commentId,$author,$comment,$postId){
    $commentManager = new JeanForteroche\Blog\Model\CommentManager();
    $commentManager->updateComment($commentId,$author,$comment);   
    header('Location: http://localhost/Projet3/index.php?action=editcomment&id='.$commentId.'&postid='.$postId.'');
}