<?php
session_start();

$users = require_once __DIR__ . '/functionsForCook.php';

echo '<br>'. 'AFTER'.'<br>' ;


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
    <input type="text" name="userLogin" placeholder="Логин" required minlength="3"><br>
    <input type="text" name="userPassword" placeholder="Пароль" required minlength="3"><br>
    <button type="submit"> Зарегистрироваться</button>
</form>


<?php

if (getCurrentUser()) {
    header("Location: myFirstSite.php");
    exit;
} else {
    echo 'Who are you';
}

echo '<br>';
if (isset($_POST['userLogin']) && isset($_POST['userPassword'])) {
    $userLogin = $_POST['userLogin'];
    $userPassword = $_POST['userPassword'];
    if (checkPassword($userLogin, $userPassword)) {
        echo 'Вы уже зарегистрированы';
        setUserCookie($userLogin,$userPassword);
        header("Location: myFirstSite.php");// тут нужно чтото вставить для куков
        exit;
    }
    else{
        echo 'Added new user'.'<br>';
        saveUser($userLogin,$userPassword);
        setUserCookie($userLogin,$userPassword);
        header("Location: myFirstSite.php");
    }

    echo 'Hello ' . $userLogin . '<br>' . 'You password - ' . sha1($userPassword);
    echo '<br>';
    var_dump(getUsersList());
    echo 'GetList is activate'. '<br>';

}

?>

<a href="myFirstSite.php"> На главную</a>

</body>
</html>
