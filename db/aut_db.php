<?php
include_once '../function.php';
$login=clean($_POST['login']);
$pass=clean($_POST['password']);

try {
    if(!empty($login)&!empty($pass)) {
        require_once('db_connect.php');
        $stmt = $pdo->prepare("SELECT * FROM users WHERE `login`=:login ");
        $stmt->bindValue(':login', $login);
        $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($pass,$rows['password'])) {
                $_SESSION['login'] = $rows['login'];
                redirect('library');
            }else{
                $_SESSION['error']='Неверный пароль или логин';
                redirect('form_aut');
            }
    }else{
        $_SESSION['error'] = "Заполните все поля!";
        redirect('form_aut');
    }
}
catch(PDOException $e)
{
    $_SESSION['error']="Ошибка выполнения запроса при авторизации";
    redirect('error');
}
