<?php

namespace JeanForteroche\Blog\Model;
use Exception;

class Comment {

    private $_id;
    private $_post_id;
    private $_author;
    private $_comment;
    private $_comment_date;
    private $_alert;
    private $_stand_by;
    private $_published;
    private $_rejected;


/* \\\\\\\\\\\::: CONSTRUCT ::::///////////: */
    public function __construct(array $datas){
        self::hydrate($datas);
    }

/* \\\\\\\\\\\::: HYDRATE ::::///////////: */
    public function hydrate(array $datas){
        
        foreach($datas as $key => $value){
            $method = 'set'.ucfirst($key);
            
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

/* \\\\\\\\\\\::: SETTER ::::///////////: */

    public function setId($id){
        if(!is_numeric($id)){
            throw new Exception('Erreur : l\'id utilisé n\'est pas un entier');
            return;
        }
        if($id<1){
            throw new Exception('Erreur : l\'id utilisé doit etre positif');
            return;
        }

        $this->_id = $id ;
    }
    
    public function setPost_id($postId){
        if(!is_numeric($postId)){
            throw new Exception('Erreur : l\'id utilisé n\'est pas un entier');
            return;
        }
        if($postId<1){
            throw new Exception('Erreur : l\'id utilisé doit etre positif');
            return;
        }
        
        $this->_postId = $postId ;
    }
    
    public function setAuthor($author){
        if(!is_string($author)){
            throw new Exception('Erreur : le nom de l\'auteur utilisé n\'est pas du type string');
            return;
        }
        
        $this->_author = $author ;
    }
    
    public function setComment($comment){
        if(!is_string($comment)){
            throw new Exception('Erreur : le contenu utilisé n\'est pas du type string');
            return;
        }
        
        $this->_comment = $comment ;
    }
    
    public function setComment_date($date){
        if(!is_string($date)){
            throw new Exception('Erreur : le titre utilisé n\'est pas du type string');
            return;
        }
        
        $this->_commentDate = $date ;
    }
    
    public function setAlert($alert){
        if(!is_numeric($alert)){
            throw new Exception('Erreur : la valeur utilisé n\'est pas un entier');
            return;
        }
        if($alert<0){
            throw new Exception('Erreur : la valeur utilisé doit etre positif');
            return;
        }
        
        $this->_alert = $alert ;
    }

    public function setStand_by($stand_by){
        if(!is_numeric($stand_by)){
            throw new Exception('Erreur : la valeur utilisé n\'est pas un entier');
            return;
        }
        if($stand_by<0){
            throw new Exception('Erreur : la valeur utilisé doit etre positif');
            return;
        }
        
        $this->_stand_by = $stand_by ;
    }

    public function setPublished($published){
        if(!is_numeric($published)){
            throw new Exception('Erreur : la valeur utilisé n\'est pas un entier');
            return;
        }
        if($published<0){
            throw new Exception('Erreur : la valeur utilisé doit etre positif');
            return;
        }
        
        $this->_published = $published ;
    }

    public function setRejected($rejected){
        if(!is_numeric($rejected)){
            throw new Exception('Erreur : la valeur utilisé n\'est pas un entier');
            return;
        }
        if($rejected<0){
            throw new Exception('Erreur : la valeur utilisé doit etre positif');
            return;
        }
        
        $this->_rejected = $rejected ;
    }
    

/* \\\\\\\\\\\::: GETTER ::::///////////: */

    public function id(){
        return $this->_id;
    }
    public function post_id(){
        return $this->_post_id;
    }
    public function author(){
        return $this->_author;
    }
    public function comment(){
        return $this->_comment ;
    }
    public function comment_date(){
        return $this->_comment_date;
    }
    public function alert(){
        return $this->_alert;
    }
    public function stand_by(){
        return $this->_stand_by;
    }
    public function published(){
        return $this->_published;
    }
    public function rejected(){
        return $this->_rejected;
    }

}