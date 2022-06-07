<?php

require_once __DIR__ . '/autoload.php';
spl_autoload_register('autoload');

$cook = new \Application\Cookie();
$train = new \Application\Trains();
$gallary = new \Application\Gallary();
$view = new \Application\View();

$allTrains = $train->getAllWay();
$allImage = $gallary->getAllPhotoName();

$view->assign('cook',$cook);
$view->assign('trains',$allTrains);
$view->assign('images',$allImage);

$log = ' ';
$pass = ' ';
$access = false;
$admin = false;

if (!empty($_COOKIE)) {
    $log = $_COOKIE['user'] ?? ' ';
    $pass = $_COOKIE['pass'] ?? ' ';
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

$view->display('index.php');


