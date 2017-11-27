<?php 
namespace JeanForteroche\Blog\Model;

require_once('model/Manager.php');

class FileManager {

    public function upload($imgFiles,$chapter)
    {
        if(isset($imgFiles['img']) AND $imgFiles['img']['error']== 0){
            
            if($imgFiles['img']['size']<=5000000){

                $filedatas = pathinfo($imgFiles['img']['name']);
                $extention_upload = $filedatas['extension'];
                $allowed_extension = array('jpg','jpeg','png','gif');

                if(in_array($extention_upload,$allowed_extension)){
                    move_uploaded_file($imgFiles['img']['tmp_name'],'web/img/portfolio/thumbnails/'.basename($chapter).'.'.$extention_upload);
                }
            }
        }
    }  

  

}