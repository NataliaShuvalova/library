<?php include_once'../function.php';?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/1.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="css/style_library.css" media="screen" type="text/css" />
    <title>Добавление книг</title>
</head>
<body>
    <?php if(!isAuthorized()):?>
        <h1>Пополнять список могут только зарегистрированные пользователи</h1>
        <div id="login">
            <a href="form_aut.php">Авторизация</a><br/>
            <a href="form_reg.php">Регистрация</a><br/><br/>
    <? else:?>
        <h3><?= $_SESSION['login']?></h3>
            <a href="../logout.php">выйти</a><br/>
            <a href="library.php">библиотека </a>
        <h1>Заполните все поля для добавлении книги</h1>
            <br/>
        </div>
        <?php if($_SESSION['error']){
            echo $_SESSION['error'];
            $_SESSION['error']=null;
        }
        ?>
        <div id="form" >
            <form method="post" action="../db/add_db.php">
                <input type="text" placeholder="Название книги" name="names">
                <input type="text" placeholder="Автор" name="authors">
                <input type="text" placeholder="Год выпуска" name="years">
                <input type="text" placeholder="Жанр" name="genres">
                <input type="text" placeholder="ISBN" name="isbns">
                <br/>
                <input type="submit" value="Добавить" name="buttons">
            </form>
        <?php endif;?>
    </div>
</body>
</html>