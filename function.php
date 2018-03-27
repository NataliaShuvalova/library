<?php
session_start();

function redirect($page){
    header("Location:../html/$page.php");
}

function isAuthorized(){
    return !empty($_SESSION['login']);
}

function clean($valueP) {
    $value =$valueP;
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    return $value;
}

function logout(){
    session_destroy();
    header("Location:html/form_aut.php");
}

function isAuth(){
    return isset($_SESSION['login'])?$_SESSION['login']:'Гость';
}

function error($e){
    if(isset($e)){
        echo $e;
        session_destroy();
    }
}