<?php 
namespace JeanForteroche\Blog\Model;

use JeanForteroche\Blog\Model\DBManager;

require_once('model/Manager.php');

class CommentManager extends DBManager{



    public function addComment($postId, $author, $comment)
    { 
        $comments = $this->_db->prepare('  INSERT INTO comments(post_id, author, comment) 
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
        $comments = $this->_db->prepare('  SELECT * /*DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr*/
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
        $comments = $this->_db->prepare('  SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr
                                    FROM comments 
                                    WHERE post_id = ? 
                                    ORDER BY comment_date 
                                    ');
        $comments->execute(array($postId));
    
        return $comments;
    }

    public function getComment($commentId)
    {
        $req = $this->_db->prepare('   SELECT id, post_id, author, comment
                                FROM comments
                                WHERE id = ?
                                ');
        $req->execute(array($commentId));
        $comment = $req->fetch();
        return $comment;
    }
    
    public function saveComment($commentId,$author,$comment)
    {
        $req = $this->_db->prepare('   UPDATE comments 
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
        $req = $this->_db->prepare('   DELETE FROM comments 
                                WHERE id = :id                                  
                                ');
        $req->execute(array(
            'id'=>$commentId
        ));
    }

    public function alertComment($commentId)
    {
        $req = $this->_db->prepare('   UPDATE comments 
                                SET alert= alert+1
                                WHERE id = :id                                    
                                    ');
        $req->execute(array(
            'id'=>$commentId
        ));
    }
    
}