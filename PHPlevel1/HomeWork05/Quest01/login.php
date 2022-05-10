<?php
session_start();
var_dump($_SESSION);
$users = require_once __DIR__ . '/functionsForCook.php';

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LoginUser</title>
</head>
<body>
<h1> Регистрация пользователя </h1>

<form action="" method="post">
    <input type="text" name="userLogin" placeholder="Логин" required><br>
    <input type="text" name="userPassword" placeholder="Пароль" required><br>
    <button type="submit"> Зарегистрироваться </button>
</form>


<?php

if ($_COOKIE['username'] == 'admin'){
    echo 'Admin is comin';
    header("Location: myFirstSite.php");
}
else {
    echo 'Who are you';
}

if (isset($_POST['userLogin']) && isset($_POST['userPassword'])) {
    $userLogin = $_POST['userLogin'];
    $userPassword = $_POST['userPassword'];
    if (checkPassword($userLogin,$userPassword)){
        echo 'Вы уже зарегистрированы';
        header("Location: myFirstSite.php"); // тут нужно чтото вставить для куков
        exit;
    }
    if (3 > strlen($userPassword)){
        echo 'Ваш пароль слишком короткий';
        exit;
    }
    echo 'Hello '. $userLogin . '<br>'. 'You password'. $userPassword;
}



?>

<a href="myFirstSite.php"> На главную</a>
