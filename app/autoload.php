<?php
if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}

spl_autoload_register(function ($class_name){
    include 'models/'.$class_name . '.php';   
});