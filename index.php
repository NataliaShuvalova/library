<?php include_once'function.php';?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"><link rel="stylesheet" href="html/css/style_library.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="html/css/1.css" media="screen" type="text/css" />

    <title>Админка</title>
</head>
<body>
    <div id="login">
    <?php if(isAuthorized()):?>
        <h1>Вы уже авторизованны как: <?= $_SESSION['login']?></h1><br/>
            <a href="logout.php">выйти</a><br/>
            <a href="html/library.php">библиотека</a>
    <?php else:?>
        <h1>Добро пожаловать</h1>
            <a href="html/form_aut.php">Авторизация</a><br/>
            <a href="html/form_reg.php">Регистрация</a><br/>
            <a href="html/library.php">Войти в библиотеку как гость</a><br/>
    <?php endif;?>
    </div>
</body>
</html>
