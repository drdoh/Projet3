<?php
require_once('model/Autoloader.php');
Autoloader::register();


/* \\\\\\\\\\\::: SESSION CONTROLER ::::///////////: */
function stopSession(){
    session_destroy();
    require('controler/nav-controler.php');
    require('view/frontend/indexView.php');
}