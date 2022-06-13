<?php

require_once __DIR__ . '/autoload.php';
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

$new = $article->findById($id)[0];
echo $new->getAll();

if(!empty($_POST)){
    $author = $_POST['author'];
    $title = $_POST['title'];
    $text = $_POST['text'];

    $new->setArticle($author,$title,$text);
    $new->save();
    header('Location: index.php');
}

?>

<hr> Изменение новости <br>
<form action="" method="post">
    <input type="text" name="author"> Author <br>
    <input type="text" name="title"> Title <br>
    <input type="text" name="text"> Text <br>
    <button type="submit"> Изменить </button>
</form>

<a href="index.php"> Main </a>


