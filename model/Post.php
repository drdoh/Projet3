<?php

namespace JeanForteroche\Blog\Model;
use Exception;
class Post {

    private $_id;
    private $_title;
    private $_chapter;
    private $_content;
    private $_creation_date;
    private $_img;

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
    
    public function setTitle($title){
        if(!is_string($title)){
            throw new Exception('Erreur : le titre utilisé n\'est pas du type string');
            return;
        }
        
        $this->_title = $title ;
    }
    
    public function setChapter($chapter){
        if(!is_numeric($chapter)){
            throw new Exception('Erreur : le numero de chapitre utilisé n\'est pas un entier');
            return;
        }
        if($chapter<1){
            throw new Exception('Erreur : le numero de chapitre doit etre positif');
            return;
        }
        
        $this->_chapter = $chapter ;
    }
    
    public function setContent($content){
        if(!is_string($content)){
            throw new Exception('Erreur : le contenu utilisé n\'est pas du type string');
            return;
        }
        
        $this->_content = $content ;
    }
    
    public function setCreation_date($date){
        /*if(!is_string($date)){
            throw new Exception('Erreur : le titre utilisé n\'est pas du type string');
            return;
        }*/
        
        $this->_creation_date = $date ;
    }
    
    public function setImg($img){
        /*if(!is_string($img)){
            throw new Exception('Erreur : le titre utilisé n\'est pas du type string');
            return;
        }*/
        
        $this->_img = $img ;
    }
    

/* \\\\\\\\\\\::: GETTER ::::///////////: */
    public function id(){
        return $this->_id;
    }
    public function title(){
        return $this->_title;
    }
    public function chapter(){
        return $this->_chapter;
    }
    public function content(){
        return $this->_content ;
    }
    public function creation_date(){
        return  $this->_creation_date;
    }
    public function img(){
        return  $this->_img;
    }
}