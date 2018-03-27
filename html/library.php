<?php
include_once'../function.php';
include_once('../db/library_db.php');
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Библиотека</title>
    <link rel="stylesheet" href="css/1.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="css/style_library.css" media="screen" type="text/css" />
</head>
<body>
    <h1>Вы вошли как: <?= isAuth();?></h1>
    <br/>
    <div id="login">
        <?php  if(!isAuthorized()):?>
            <a href="form_aut.php">Авторизация</a><br/>
            <a href="form_reg.php">Регистрация</a><br/><br/>
        <? else:?>
            <a href="../logout.php">выйти</a>
        <?php endif;?>
    </div>
        <div id="form">
            <form method="post">
                <input type="text" placeholder="поиск книги" name="book">
                <input type="submit" value="поиск">
            </form>
            <?php error($_SESSION['error']);?>
            <table>
                <tr>
                    <th >Название</th>
                        <th >Автор</th>
                        <th >Год выпуска</th>
                        <th >Жанр</th>
                        <th >isbn</th>
                </tr>
                <?php if(!isset($results)) :
                    echo'Ничего не найдено';
                else:
                    foreach($results as $result): ?>
                        <tr>
                            <td><?=$result["name"]; ?></td>
                            <td><?=$result["author"]; ?></td>
                            <td><?=$result["year"]; ?></td>
                            <td><?=$result["genre"]; ?></td>
                            <td><?=$result["isbn"]; ?></td>
                        </tr>
                    <?php endforeach;
                endif?>
            </table>
            <a href="add.php">Добавить новую книгу</a>
        </div>
    </body>
</html>