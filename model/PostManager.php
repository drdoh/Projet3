<?php 

namespace JeanForteroche\Blog\Model;
use \PDO;

require_once('model/Manager.php');
require_once('model/Post.php');

class PostManager extends DBManager{

/* \\\\\\\\\\\::: READ ::::///////////: */

    public function getAllPosts()
    {
        $req = $this->db()->query(' SELECT id, title, content, chapter,img, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr
                                    FROM posts 
                                    ORDER BY id 
                                    ');
        $datas = $req->fetchAll();
        $req->closeCursor();
        $posts = [];
        foreach($datas as $data){
            $posts[] = new Post($data);
        }
        return $posts;
    }

    public function getLastPosts()
    {
        $req = $this->db()->query(' SELECT id, title, content, chapter, img, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr
                                    FROM posts 
                                    ORDER BY id 
                                    DESC LIMIT 0, 6
                                    ');
        $datas = $req->fetchAll();
        $req->closeCursor();
        $posts = [];
        foreach($datas as $data){
            $posts[] = new Post($data);
        }
        return $posts;
    }

    public function getSomePosts($cPage,$perPage)
    {
        $req = $this->db()->query(' SELECT id, title, content, chapter, img, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr
                                    FROM posts 
                                    ORDER BY id 
                                    LIMIT '.(($cPage-1)*$perPage).','.$perPage.'
                                    ');

        $datas = $req->fetchAll();
        $req->closeCursor();
        $posts = [];
        foreach($datas as $data){
            $posts[] = new Post($data);
        }
        return $posts;
    }

    public function getPost($postId)
    {

        $req = $this->db()->prepare('SELECT */*id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr*/
                                    FROM posts 
                                    WHERE id = ?
                                    ');

        $req->execute(array($postId));
        $datas = $req->fetch();
        
        $req->closeCursor();
        $post = new Post($datas);
        return $post;
    }
/* \\\\\\\\\\\::: COUNT ::::///////////: */

public function countPosts()
{
    
    $req = $this->db()->query('  SELECT COUNT(*) AS nbposts
                                FROM posts 
                                ');
    $datas = $req->fetchAll();
    $req->closeCursor();

    return $datas[0];

}

/* \\\\\\\\\\\::: UPDATE  ::::///////////: */

    public function updatePost($title,$content,$id, $chapter)
    {
        $req = $this->db()->prepare('UPDATE posts 
                                    SET content= :newcontent, title= :newtitle, chapter= :newchapter
                                    WHERE id = :id                                    
                                ');
        $req->execute(array(
            'newcontent'=>$content,
            'newtitle'=>$title,
            'newchapter'=>$chapter,
            
            'id'=>$id
        ));
        $req->closeCursor();
    }
/* \\\\\\\\\\\::: CREATE  ::::///////////: */

    public function addPost($title,$content,$chapter, $img)
    {

        $req = $this->db()->prepare('   INSERT INTO posts(title, content, chapter, img) 
                                VALUES (:title,:content, :chapter, :img)                                  
                                ');
        $req->execute(array(
            'title'=>$title,
            'content'=>$content,
            'chapter'=>$chapter,
            'img'=>$img
        ));
        $req->closeCursor();
    }

/* \\\\\\\\\\\::: DELETE  ::::///////////: */

    public function deletePost($id)
    {

        $req = $this->db()->prepare('   DELETE FROM posts 
                                WHERE id = :id                                  
                                ');
        $req->execute(array(
            'id'=>$id
        ));
        $req->closeCursor();
    }

}