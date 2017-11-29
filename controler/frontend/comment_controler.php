<?php
require_once('model/Autoloader.php');
Autoloader::register();

function addComment($postId, $author, $comment){
    
        // verif ... 
        
        $commentManager = new JeanForteroche\Blog\Model\CommentManager();
        $affectedLines = $commentManager->addComment($postId, $author, $comment);
        if($affectedLines === false){
            throw new Exception('Impossible d\'ajouter le commentaire');
        }
        else{
            // Votre commentaire a bien ete envoyer
            
            header('Location: index.php?action=post&id='.$postId);
        }
    }
    
    function alertComment($commentId,$postId){
        $commentManager = new JeanForteroche\Blog\Model\CommentManager();
        $comment=$commentManager->alertComment($commentId);   
        header('Location: index.php?action=post&id='.$postId);
    }
    