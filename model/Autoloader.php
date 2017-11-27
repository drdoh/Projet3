<?php

class Autoloader{

    private $class_name;

    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function autoload($class_name){
        $class_name=str_replace('JeanForteroche\\Blog\\Model\\','',$class_name); 
        require 'model/'.$class_name.'.php';
    }

}