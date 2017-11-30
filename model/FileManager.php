<?php 
namespace JeanForteroche\Blog\Model;

require_once('model/Manager.php');

class FileManager {

/* \\\\\\\\\\\::: UPLOAD IMG ::::///////////: */

    public function upload($imgFiles,$chapter)
    {
        if(isset($imgFiles['img']) AND $imgFiles['img']['error']== 0){
            
            if($imgFiles['img']['size']<=5000000){

                $filedatas = pathinfo($imgFiles['img']['name']);
                $extention_upload = $filedatas['extension'];
                $allowed_extension = array('jpg','jpeg','png','gif');

                if(in_array($extention_upload,$allowed_extension)){
                    
                    $resizedImg = $this->resize($imgFiles,$chapter,$extention_upload );
                   
                    move_uploaded_file($imgFiles['img']['tmp_name'],'web/img/portfolio/fullsize/'.basename($chapter).'.'.$extention_upload);
                }
            }
        }
    } 
    
/* \\\\\\\\\\\::: RESIZE IMG ::::///////////: */
    public function resize($imgFiles,$chapter,$extention_upload)
    {
        $filename = $imgFiles['img']['tmp_name'];
        
        header('Content-Type: image/jpeg');

        list($width, $height) = getimagesize($filename);

        $thumb = imagecreatetruecolor(650, 350);
        $source = imagecreatefromjpeg($filename);
        
        imagecopyresampled($thumb, $source, 0, 0, 0, 0, 650, 350, $width, $height);
        
        
        imagejpeg($thumb,'web/img/portfolio/thumbnails/'.$chapter.'.'.$extention_upload);
      
        imagedestroy($thumb);      
        
    }  
  

}