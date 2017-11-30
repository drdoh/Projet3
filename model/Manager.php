<?php 
namespace JeanForteroche\Blog\Model;
use \PDO;

class DBManager{

    private $host='localhost';
    private $dbname='projet3';
    private $name='root';
    private $password='root';
    protected $_db;

/* \\\\\\\\\\\::: PDO OBJ ::::///////////: */

    protected function dbConnect()
    {
            $db = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname.';charset=utf8', ''.$this->name.'', ''.$this->password.'', array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION));
            return $db;
    }

/* \\\\\\\\\\\::: CONSTRUCT ::::///////////: */

    public function __construct(){
        $db = $this->dbConnect();
        $this->setDb($db);
    }

/* \\\\\\\\\\\::: SETTER ::::///////////: */

    public function setDb($db){
        $this->_db = $db;
    }

/* \\\\\\\\\\\::: GETTER ::::///////////: */

    public function db(){
        return $this->_db;
    }
}