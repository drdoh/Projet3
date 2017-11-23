<?php 
namespace JeanForteroche\Blog\Model;
use \PDO;

class Manager{

    private $host='localhost';
    private $dbname='projet3';
    private $name='root';
    private $password='root';

    protected function dbConnect()
    {
            $db = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname.';charset=utf8', ''.$this->name.'', ''.$this->password.'');
            return $db;
        
    }

}