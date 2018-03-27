<?php
include_once '../function.php';

$name=clean($_POST['names']);
$author=clean($_POST['authors']);
$year=clean($_POST['years']);
$isbn=clean($_POST['isbns']);
$genre=clean($_POST['genres']);



    if(!empty($name) & !empty($author) & !empty($year) & !empty($isbn) & !empty($genre)){
        if(is_numeric($year)){
            try{
                require_once('db_connect.php');
                $s = $pdo->prepare("SELECT * FROM books WHERE `name`=:name OR `isbn`=:isbn");
                $s->bindValue(':name', $name);
                $s->bindValue(':isbn', $isbn);
                $s->execute();
                $rows = $s->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e)
            {
                $_SESSION['error']='Ошибка при выборки данных из БД при пополнении библиотеки';
                redirect('error');
            }
            if(isset($rows['name'])){
                    $_SESSION['error'] = 'Книга с таким названием уже есть в библиотеки!';
                    redirect('add');
            }elseif($rows['isbn']){
                    $_SESSION['error'] = 'Книга с таким ISBN уже есть в библиотеки!';
                    redirect('add');
            }else {
                try{
                    require_once('db_connect.php');
                    $sql = 'INSERT INTO books SET
                    `name`=:name,
                    `author`=:author,
                    `year`= :year,
                    `isbn`=:isbn,
                    `genre`=:genre';
                    $s = $pdo->prepare($sql);
                    $s->bindValue(':name', $name);
                    $s->bindValue(':author', $author);
                    $s->bindValue(':year', $year);
                    $s->bindValue(':isbn', $isbn);
                    $s->bindValue(':genre', $genre);
                    $s->execute();
                    redirect('library');
                }catch(PDOException $e)
                {
                    $_SESSION['error']='Ошибка при добавлении данных в БД';
                    redirect('error');
                }
            }
        }else{
            $_SESSION['error']='Введит год числом!';
            redirect('add');
        }
    }else{
        $_SESSION['error']= 'Вы заполнили не все поля';
        redirect('add');
    }
