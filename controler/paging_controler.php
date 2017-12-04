<?php
require_once('model/Autoloader.php');
Autoloader::register();

    function pagingPost($postManager,$perPage){
    
        $datas = $postManager->countPosts();
        $nbPosts = $datas[0]['nbposts'];
        $nbPage= ceil($nbPosts/$perPage);
        if(isset($_GET['p'])&& $_GET['p']>0 && $_GET['p']<=$nbPage){
            $cPage = $_GET['p'];
        }else{
            $cPage = 1;
        }
        
        
        for($i=1;$i<=$nbPage;$i++){
            if($i==$cPage){
                echo " $i /"; 
            }else{
                echo " <a href=\"index.php?p=$i\">$i</a> / ";
            }
        }

        return $cPage;
        
    }