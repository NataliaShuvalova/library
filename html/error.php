<?php session_start();?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/1.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="css/style_library.css" media="screen" type="text/css" />
    <title>Ошибка</title>
</head>
<body>
    <h1><?=$_SESSION['error'];?></h1>
</body>
</html>