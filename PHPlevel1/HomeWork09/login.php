<?php

require_once __DIR__ . '/autoload.php';
spl_autoload_register('autoload');

$cook = new \Application\Cookie();

$access = false;
$log = ' ';
$pass = ' ';
$user = '';
$secret = '';

if (!empty($_COOKIE)) {
    $log = $_COOKIE['user'] ?? ' ';
    $pass = $_COOKIE['pass'] ?? ' ';
}

if ($cook->checkPassword($log, $pass)) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['user']) && isset($_POST['pass'])) {
    $user = trim($_POST['user']) ?? '';
    $secret = trim($_POST['pass']) ?? '';
    $access = true;
}

if (empty($user) || empty($secret)) {
    echo 'Заполните поля!';
}

if ($cook->checkPassword($user, $secret)) {
    $cook->setCookie($user, $secret);
    header('Location: index.php');
    exit;
}

if ($access && isset($_POST['out'])){
    try {
        if ($user !== 'Boss' && $user !== 'Admin'){
            $cook->saveUser($user,$secret);
            $cook->setCookie($user,$secret);
            header('Location: login.php');
            exit;
        }
        echo 'Недопустимое имя';
    }
    catch (Exception $ex){
        echo $ex->getMessage();
    }
}
?>

<hr> Регистрация <br>
<form action="" method="post">
    <input type="text" name='user' placeholder="Логин" required><br>
    <input type="text" name='pass' placeholder="Пароль" required><br>
    <input type="hidden" name="out" value="1">
    <button type="submit"> Зарегаться</button>
</form>

<a href="index.php"> Main </a>
