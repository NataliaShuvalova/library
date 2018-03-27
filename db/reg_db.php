<?php
include_once '../function.php';

$login=clean($_POST['login']);
$pass=clean($_POST['password']);
$pass_rep=clean($_POST['password_repeat']);

if(!empty($login)&!empty($pass)&!empty($pass_rep)){
    try{
        require_once('db_connect.php');
        $stmt = $pdo->prepare("SELECT * FROM users WHERE login=:login");
        $stmt->bindValue(':login', $login);
        $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $e)
    {
        $_SESSION['error']='Ошибка при выборки данных в БД при регистрации';
        redirect('error');
    }

    if(!isset($rows['login'])){
        if($pass===$pass_rep){
            $pass=password_hash($pass, PASSWORD_DEFAULT);
            try{
                $sql=("INSERT INTO users SET
                `login`=:login,
                `password`=:password");
                $result =$pdo->prepare($sql);
                $result ->bindValue(':login', $login);
                $result ->bindValue(':password', $pass);
                $result ->execute();
                $_SESSION['login']=$login;
                redirect('reg_successfully');
            }catch(PDOException $e)
            {
                $_SESSION['error']='Ошибка при добавлении данных в БД при регистрации';
                redirect('error');
            }
        }else{
            $_SESSION['error']='Пароль не совпадает!';
            redirect('form_reg');
        }
    }else{
        $_SESSION['error'] = "Логин занят!";
        redirect('form_reg');
    }
}else{
    $_SESSION['error']='Вы не заполнили все поля!';
    redirect('form_reg');
}

