<?php

require_once __DIR__ . '/classes/News.php';
require_once __DIR__ . '/classes/ConnectBase.php';
require_once __DIR__ . '/classes/Article.php';
require_once __DIR__ . '/classes/View.php';
//--------------------------------------------------------


$dataBase = new ConnectBase();
$viev = new View();
try {
    $news = new News($dataBase->getTable());
} catch (Exception $ex) {
    echo $ex->getMessage();
}

//$data = $news->getNews();
foreach ($news->getNews() as $key=>$new) {
    echo $new->getAuthor() . '<br>';
    echo $new->getTitle() . '<br>';
    echo $new->getText() . '<br>';
    echo '<br> ------'.$key.'-----<br>';
}




//$prepare = $dbh->prepare($sql); // проверить
//$prepare->execute(); // валидация запроса выплнить
//$data = $prepare->fetchAll(); // массив данных

?>
