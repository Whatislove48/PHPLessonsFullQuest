<?php

require_once __DIR__.'/../classes/View.php';
require_once __DIR__.'/../classes/News.php';
require_once __DIR__.'/../classes/Article.php';


$news = new News();
$view = new View();
if (!isset($_GET['id'])) {
    header('location: http://lessonshmsh/PHPLessonsFullQuest/PHPlevel1/HomeWork07/first.php');
}
$number = (int)$_GET['id'];


$new = $news->getNews();
echo $new[$number]->getTitle();
echo '<br>-----------Title-----------';
echo $new[$number]->getText();

?>

<html lang="ru">
<a href="../first.php">На главную</a>
</html>