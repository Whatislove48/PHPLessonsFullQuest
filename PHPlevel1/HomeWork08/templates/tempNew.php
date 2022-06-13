<?php

require_once __DIR__.'/../classes/View.php';
require_once __DIR__.'/../classes/News.php';
require_once __DIR__.'/../classes/Article.php';

$dataBase = new ConnectBase();
$view = new View();
$sql = 'SELECT * FROM news WHERE id=:id'; // Перенести в index

if (!isset($_GET['id'])) {
    header('location: http://lessonshmsh/PHPLessonsFullQuest/PHPlevel1/HomeWork07/first.php');
}

try{
    $data = $dataBase->query($sql,$_GET);
}
catch (PDOException $ex){
    $ex->getMessage();
}

$article = new Article($data[0]['id'],
                        $data[0]['author'],
                        $data[0]['title'],
                        $data[0]['text']);

$view->assign(0,$article);
$view->display('tempOneNew.php');

?>
<hr>
<html lang="ru">
<a href="../testDB.php">На главную</a>
</html>