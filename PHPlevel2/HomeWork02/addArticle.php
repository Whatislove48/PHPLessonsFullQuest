<?php

require_once __DIR__ . '/../App/autoload.php';
spl_autoload_register('autoload');

$article = new \App\Models\Article();
$cook = new \App\Models\Cookie();

$log = ' ';
$pass = ' ';

if (!empty($_COOKIE)) {
    $log = $_COOKIE['user'] ?? ' ';
    $pass = $_COOKIE['pass'] ?? ' ';
}

if (!$cook->checkPassword($log, $pass)) {
    header('Location: index.php');
    exit;
}

$author = '';
$title = '';
$text = '';

if(!empty($_POST)){
    $author = $_POST['author'];
    $title = $_POST['title'];
    $text = $_POST['text'];
}
else{
    header('Location: index.php');
}

$article->setArticle($author,$title,$text);
$article->save();
header('Location: index.php');

