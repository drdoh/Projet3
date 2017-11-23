<?php 
namespace JeanForteroche\Blog\Model;

use JeanForteroche\Blog\Model\Manager;

require_once('model/Manager.php');

class CommentManager extends Manager{

    public function postComment($postId, $author, $comment)
    {
      
      
      // verif
      
      $db = $this->dbConnect();
        
        $comments = $db->prepare('  INSERT INTO comments(post_id, author, comment) 
                                    VALUES (:post_id, :author, :comment)
                                ');
        $affectedLines = $comments->execute(array(
            'post_id'=> $postId,
            'author'=> $author,
            'comment'=> $comment
        ));
    
        return $affectedLines;
    }

    public function getLastComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('  SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr
                                    FROM comments 
                                    WHERE post_id = ? 
                                    ORDER BY comment_date 
                                    DESC LIMIT 0, 7
                                    ');
        $comments->execute(array($postId));
    
        return $comments;
    }

    public function getAllComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('  SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr
                                    FROM comments 
                                    WHERE post_id = ? 
                                    ORDER BY comment_date 
                                    ');
        $comments->execute(array($postId));
    
        return $comments;
    }

    public function getComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('   SELECT id, post_id, author, comment
                                FROM comments
                                WHERE id = ?
                                ');
        $req->execute(array($commentId));
        $comment = $req->fetch();
        return $comment;
    }
    
    public function saveComment($commentId,$author,$comment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('   UPDATE comments 
                                SET author= :newauthor, comment= :newcomment
                                WHERE id = :id                                    
                                    ');
        $req->execute(array(
            'newauthor'=>$author,
            'newcomment'=>$comment,
            'id'=>$commentId
        ));
    }

    public function deleteComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('   DELETE FROM comments 
                                WHERE id = :id                                  
                                ');
        $req->execute(array(
            'id'=>$commentId
        ));
    }

    public function alertComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('   UPDATE comments 
                                SET alert= alert+1
                                WHERE id = :id                                    
                                    ');
        $req->execute(array(
            'id'=>$commentId
        ));
    }
    
}