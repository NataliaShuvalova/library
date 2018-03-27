<?php include_once'../function.php';?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title>Регистрация</title>
        <link rel="stylesheet" href="css/1.css" media="screen" type="text/css" />
        <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
</head>
<body>
    <div id="login">
        <?php if(isAuthorized()):?>
        <h1>Вы уже авторизованны как: <?= $_SESSION['login']?></h1><br/>
            <a href="../logout.php">выйти</a><br/>
            <a href="library.php">библиотека</a></div>
        <?php else:?>
            <a href="library.php">Войти как гость</a>
        <div id="form">
            <?php error($_SESSION['error']);?>
            <form action="../db/reg_db.php" method="post">
                <fieldset class="clearfix">
                    <p>
                        <span class="fontawesome-user"></span>
                        <input type="text" placeholder="Логин" name="login">
                    </p>
                    <p>
                        <span class="fontawesome-user"></span>
                        <input type="password" placeholder="Пароль" name="password">
                    </p>
                    <p>
                        <span class="fontawesome-lock"></span>
                        <input type="password" placeholder="Повторите пароль" name="password_repeat">
                    </p>
                   <p>
                       <input type="submit" value="Регистрация">
                   </p>
                </fieldset>
            </form>
        <?php endif;?>
    </div>
</body>
</html>