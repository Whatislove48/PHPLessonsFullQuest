<?php

require_once __DIR__ . '/../App/autoload.php';
spl_autoload_register('autoload');

$article = new \App\Models\Article();
$view = new \App\View\Views();
$cook = new \App\Models\Cookie();

$view->assign('cook',$cook);
$view->assign('news',$article->findAll());

$log = ' ';
$pass = ' ';
$access = false;
$admin = false;

if (!empty($_COOKIE)) {
    $log = $_COOKIE['user'] ?? ' ';
    $pass = $_COOKIE['pass'] ?? ' ';
    $userLog = $log;
    $userPass = $pass;
}

if (isset($_POST['out']) && 1 == $_POST['out']) {
    setcookie('user', '', -3600);
    setcookie('pass', '', -3600);
    header('Location: index.php');
}

if ($cook->checkPassword($log, $pass)) {
    $access = true;
    if ('Boss' === $log || 'Admin' === $log) {
        $admin = true;
    }
}
$view->assign('admin',$admin);
$view->assign('access',$access);
$view->assign('log',$log);
$view->assign('pass',$pass);
$view->display('HW02/main.php');



