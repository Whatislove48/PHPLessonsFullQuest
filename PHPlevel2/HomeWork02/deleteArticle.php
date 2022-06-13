<?php

require_once __DIR__ . '/../App/autoload.php';
spl_autoload_register('autoload');

$article = new \App\Models\Article();
$cook = new \App\Models\Cookie();

$log = ' ';
$pass = ' ';
$id = '';

if (!empty($_COOKIE)) {
    $log = $_COOKIE['user'] ?? ' ';
    $pass = $_COOKIE['pass'] ?? ' ';
}
if (!$cook->checkPassword($log, $pass)) {
    header('Location: index.php');
    exit;
}
if(!empty($_GET)){
    $id = $_GET['id'];
}
else{
    header('Location: index.php');
}

$del = $article->findById($id)[0];
$del->delete();

header('Location: index.php');
