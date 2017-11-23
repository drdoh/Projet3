<?php 
namespace JeanForteroche\Blog\Model;

use JeanForteroche\Blog\Model\Manager;

require_once('model/Manager.php');

class AdminManager extends Manager{

    public function getPassword($name)
    {
        {
            $db = $this->dbConnect();
            $req = $db->prepare('   SELECT passwords
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