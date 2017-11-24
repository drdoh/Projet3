<?php 

namespace JeanForteroche\Blog\Model;

require_once('model/Manager.php');

class PostManager extends DBManager{
    
    public function getAllPosts()
    {
        $req = $this->_db->query(' SELECT id, title, content, chapter,img, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr
                            FROM posts 
                            ORDER BY id 
                            ');

    return $req;
    }

    public function getPosts()
    {
        $req = $this->_db->query(' SELECT id, title, content, chapter, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr
                            FROM posts 
                            ORDER BY id 
                            DESC LIMIT 0, 6
                            ');

    return $req;
    }

    public function getPost($postId)
    {

        $req = $this->_db->prepare('SELECT */*id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr*/
                                    FROM posts 
                                    WHERE id = ?
                                    ');

        $req->execute(array($postId));
        $post = $req->fetch();
        
    return $post;
    }

    public function updatePost($title,$content,$id)
    {

        $req = $this->_db->prepare('   UPDATE posts 
                                SET content= :newcontent, title= :newtitle
                                WHERE id = :id                                    
                                ');
        $req->execute(array(
            'newcontent'=>$content,
            'newtitle'=>$title,
            
            'id'=>$id
        ));
    }

    public function addPost($title,$content)
    {

        $req = $this->_db->prepare('   INSERT INTO posts(title, content) 
                                VALUES (:title,:content)                                  
                                ');
        $req->execute(array(
            'title'=>$title,
            'content'=>$content
        ));
    }
    
    public function deletePost($id)
    {

        $req = $this->_db->prepare('   DELETE FROM posts 
                                WHERE id = :id                                  
                                ');
        $req->execute(array(
            'id'=>$id
        ));
    }

}