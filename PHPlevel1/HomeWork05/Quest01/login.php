<?php
session_start();

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
<h1>
    Регистрация пользователя
</h1>

<form action="" method="post">
    <input type="text" name="userLogin" value="Логин" required><br>
    <input type="text" name="userPassword" value="Пароль" required><br>
    <button type="submit"> Зарегистрироваться </button>
</form>


<?php

$userLogin = $_POST['userLogin'];
$userPassword = $_POST['userPassword'];

if (4 > strlen($userPassword)){
    echo 'Ваш проль слишком короткий';
    exit;
}
echo password_hash($userPassword, PASSWORD_DEFAULT);






?>

<a href="myFirstSite.php"> На главную</a>
