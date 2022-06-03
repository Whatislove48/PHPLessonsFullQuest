<?php

require_once __DIR__ . '/autoload.php';
spl_autoload_register('autoload');

$cook = new \Application\Cookie();

$access = false;
$log = $_COOKIE['user'];
$pass = $_COOKIE['pass'];

if ($cook->checkPassword($log,$pass)){
    header('Location: index.php');
}
//     главная проблема в том, что поля поста (массив пост) имеют значение нулл
//     либо сделать проверку авторизации на главной странице
//     либо поставить по умолчанию
//

if (empty($_POST)){
    header('Location: index.php');
}

if (empty(trim($_POST['user'])) && empty(trim($_POST['pass']))){
    echo 'Заполните поля';
}
if($cook->checkPassword(trim($_POST['user']),trim($_POST['pass']))){
    $cook->setCookie(trim($_POST['user']),trim($_POST['pass']));
    header('Location: index.php');
}

?>

<hr> Регистрация <br>
<form action="" method="post">
    <input type="text" name='user' placeholder="Логин" required minlength="3"><br>
    <input type="text" name='pass' placeholder="Пароль" required minlength="3"><br>
    <button type="submit"> Зарегаться </button>
</form>
