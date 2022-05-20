<?php

require_once __DIR__.'/../classes/View.php';
require_once __DIR__.'/../classes/News.php';
require_once __DIR__.'/../classes/Article.php';

$dataBase = new ConnectBase();
$sql = 'SELECT * FROM news WHERE id=:id';

if (!isset($_GET['id'])) {
    header('location: http://lessonshmsh/PHPLessonsFullQuest/PHPlevel1/HomeWork07/first.php');
}

$data = $dataBase->query($sql,$_GET);

$article = new Article($data[0]['id'],
                        $data[0]['author'],
                        $data[0]['title'],
                        $data[0]['text']);

echo '<br>Author: ';
echo $article->getAuthor();
echo '<br>Title: ';
echo $article->getTitle();
echo '<br>Text<br>';
echo $article->getText();

?>

<html lang="ru">
<a href="../testDB.php">На главную</a>
</html>