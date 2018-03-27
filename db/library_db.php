<?php
include_once '../function.php';
try
{
    require_once('db_connect.php');
    $sql="SELECT * FROM books";
    $s=$pdo->prepare($sql);
    $s->execute();
}catch(PDOException $e) {

    $_SESSION['error'] = "Ошибка при извлечении данных из БД в библиотеке";
    redirect('error');
}

$book=clean($_POST['book']);

if(!empty($book)){
    try{
        $sql="SELECT * FROM books WHERE `author` LIKE ?  OR `name`LIKE ? OR `isbn`LIKE ? OR `year`LIKE ? OR `genre`LIKE ?";
        $s=$pdo->prepare($sql);
        $s->bindValue(1,"%$book%", PDO::PARAM_STR);
        $s->bindValue(2,"%$book%", PDO::PARAM_STR);
        $s->bindValue(3,"%$book%", PDO::PARAM_STR);
        $s->bindValue(4,"%$book%", PDO::PARAM_STR);
        $s->bindValue(5,"%$book%", PDO::PARAM_STR);
        $s->execute();
    }catch(PDOException $e){
        $_SESSION['error']="Ошибка при выборке данных из БД в библиотек";
        redirect('error');
    }
}
if(isset($s)){
    while($row=$s->fetchAll(PDO::FETCH_ASSOC)){
        $results=$row;
    }
}