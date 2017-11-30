<?php 
namespace JeanForteroche\Blog\Model;

use JeanForteroche\Blog\Model\Manager;

require_once('model/Manager.php');

class AdminManager extends DBManager{

    public function getPassword($name)
    {
        {
            $req = $this->db()->prepare('SELECT passwords
                                        FROM admins 
                                        WHERE names = ?
                                        ');
    
            $req->execute(array($name));
            $pass = $req->fetch();
            $password=$pass['passwords'];
            return $password; 
        }
        
    }    
}