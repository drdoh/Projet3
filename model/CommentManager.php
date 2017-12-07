<?php 
namespace JeanForteroche\Blog\Model;

use JeanForteroche\Blog\Model\DBManager;
use \PDO;
require_once('model/Manager.php');
require('model/Comment.php');

class CommentManager extends DBManager{

/* \\\\\\\\\\\::: READ ::::///////////: */

    public function getLastPostComments($postId)
    {
        $req = $this->db()->prepare('SELECT * ,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr
                                    FROM comments 
                                    WHERE post_id = ? AND published = 1
                                    ORDER BY comment_date 
                                    DESC LIMIT 0, 7
                                    ');

        $req->execute(array($postId));
        $datas = $req->fetchAll();
        $req->closeCursor();
        $comments = [];

        foreach($datas as $data){
            $comments[] = new Comment($data);
        }

        return $comments;
    }

    public function getAllComments()
    {
        $req = $this->db()->query('  SELECT * ,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr
                                    FROM comments 
                                    ORDER BY comment_date DESC
                                    ');
        $datas = $req->fetchAll();
        $req->closeCursor();

        $comments = [];
        foreach($datas as $data){
            $comments[] = new Comment($data);
        }
        return $comments;
    }

    public function getPostComments($postId)
    {
        $req = $this->db()->prepare('SELECT * ,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr
                                    FROM comments 
                                    WHERE post_id = ? 
                                    ORDER BY comment_date DESC
                                    ');
        $req->execute(array($postId));
        $datas = $req->fetchAll();
        $req->closeCursor();
        $comments = [];
        foreach($datas as $data){
            $comments[] = new Comment($data);
        }
        return $comments;
    }

    public function getComment($commentId)
    {
        $req = $this->db()->prepare('   SELECT * ,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr
                                        FROM comments
                                        WHERE id = ?
                                        ');
        $req->execute(array($commentId));
        $datas = $req->fetch();
        $comment=new Comment($datas);
        return $comment;
    }
    
    public function getFilteredComments($filter)
    {
        $req = $this->db()->query(' SELECT * ,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr
                                    FROM comments 
                                    WHERE  '.$filter.' = TRUE
                                    ORDER BY comment_date DESC
                                    ');
        $datas = $req->fetchAll();
        
        $req->closeCursor();
       
        $comments = [];
        foreach($datas as $data){
            $comments[] = new Comment($data);
        }
        return $comments;
    }

    public function getAlertComments()
    {
        $req = $this->db()->query(' SELECT *,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr
                                    FROM comments 
                                    WHERE  Alert >= 1
                                    ORDER BY comment_date DESC
                                    ');
        $datas = $req->fetchAll();
        
        $req->closeCursor();
        $comments = [];
        foreach($datas as $data){
            $comments[] = new Comment($data);
        }
        return $comments;
    }

/* \\\\\\\\\\\::: COUNT ::::///////////: */

    public function countComments()
    {
        
        $req = $this->db()->query('  SELECT COUNT(*) AS nbcomment
                                    FROM comments 
                                    ');
        $datas = $req->fetchAll();
        $req->closeCursor();
        return $datas;

    }

    public function countAlertComments()
    {
        $req = $this->db()->query('  SELECT COUNT(alert) AS nb_alert_comment
                                    FROM comments 
                                    WHERE alert >= 1
                                    ');
        $datas = $req->fetchAll();
        $req->closeCursor();
        return $datas;
    }

     public function countFilteredComments($filter)
    {
        $req = $this->db()->query('  SELECT COUNT('.$filter.') AS nb_'.$filter.'_comment
                                    FROM comments 
                                    WHERE '.$filter.' = TRUE
                                    ');
        $datas = $req->fetchAll();
        $req->closeCursor();
        return $datas;
        
    }

/* \\\\\\\\\\\::: UPDATE  ::::///////////: */

    public function updateComment($commentId,$comment)
    {
        $req = $this->db()->prepare('   UPDATE comments 
                                SET comment= :newcomment
                                WHERE id = :id                                    
                                    ');
        $req->execute(array(
            'newcomment'=>$comment,
            'id'=>$commentId
        ));
    }

    public function acceptComment($commentId)
    {
        $req = $this->db()->prepare('   UPDATE comments 
                                SET published= 1, stand_by= 0,rejected= 0, alert=0
                                WHERE id = :id                                    
                                    ');
        $req->execute(array(
            'id'=>$commentId
        ));
    }

    public function rejetComment($commentId)
    {
        $req = $this->db()->prepare('   UPDATE comments 
                                SET rejected= 1, stand_by= 0, published= 0
                                WHERE id = :id                                    
                                    ');
        $req->execute(array(
            'id'=>$commentId
        ));
    }

    public function alertComment($commentId)
    {
        $req = $this->db()->prepare('   UPDATE comments 
                                SET alert= alert+1
                                WHERE id = :id                                    
                                    ');
        $req->execute(array(
            'id'=>$commentId
        ));
    }

/* \\\\\\\\\\\::: CREATE  ::::///////////: */
    
    public function addComment($postId, $author, $comment)
    { 
        $req = $this->db()->prepare('  INSERT INTO comments(post_id, author, comment) 
                                    VALUES (:post_id, :author, :comment)
                                ');
        $datas = $req->execute(array(
            'post_id'=> $postId,
            'author'=> $author,
            'comment'=> $comment
        ));
    }

/* \\\\\\\\\\\::: DELETE  ::::///////////: */

    public function deleteComment($commentId)
    {
        $req = $this->db()->prepare('   DELETE FROM comments 
                                WHERE id = :id                                  
                                ');
        $req->execute(array(
            'id'=>$commentId
        ));
    }

    public function deletePostComment($postId)
    {
        $req = $this->db()->prepare('   DELETE FROM comments 
                                WHERE post_id = :post_id                                  
                                ');
        $req->execute(array(
            'post_id'=>$postId
        ));
    }
}