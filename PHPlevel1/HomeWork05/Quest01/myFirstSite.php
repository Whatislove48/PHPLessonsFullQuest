<?php
$users = require_once __DIR__ . '/functionsForCook.php';
session_start();
//setcookie('username','admin');
//setcookie('secret',sha1('13.04.1980'));

var_dump($users['admin']);
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Autorize</title>
</head>
<body>

<h1>First Site</h1>

<a href="login.php"> На страницу авторизации</a><br>


<form action="" method="post">
    <input type="text" name = 'password' required>
    <button type="submit"> Send </button>
</form>

<?php

echo 'MAIN' . '<br>';
var_dump($_POST);

if (isset($_POST['password'])) {
    $password = $_POST['password'];

    echo password_hash($password, PASSWORD_DEFAULT); // Хэширует пароль указанный в аргументе
}

$db = '$2y$10$OQMn7UABIBBHWwssZvX.5uRfzNiJsN3ZNduus2DxW63GTARsoZVZ6';

echo '<br>';
var_dump(password_verify($password,$db));


?>



</body>
</html>