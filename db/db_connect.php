<?php
include_once '../function.php';
$host='localhost';
$db='t';
$user='root';
$password=null;

try
{
    $pdo=new PDO("mysql:host=$host; dbname=$db; charset=utf8", $user, $password);
}
catch(PDOException $e)
{
    $_SESSION['error']="Невозможно подключиться к серверу БД";
    redirect('error');
}