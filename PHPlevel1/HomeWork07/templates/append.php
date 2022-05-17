<?php

require_once __DIR__.'/../classes/View.php';
require_once __DIR__.'/../classes/News.php';
require_once __DIR__.'/../classes/Article.php';


$news = new News();
$view = new View();
$number = (int)$_GET['id'];

var_dump($_GET);
$new = $news->getNews();
echo $new[$number]->getTitle();
echo '<br>-----------Title-----------';
echo $new[$number]->getText();

?>

<html lang="ru">
<a href="../first.php">На главную</a>
</html>