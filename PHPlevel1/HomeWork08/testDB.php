<?php

require_once __DIR__ . '/classes/News.php';
require_once __DIR__ . '/classes/ConnectBase.php';
require_once __DIR__ . '/classes/Article.php';
require_once __DIR__ . '/classes/View.php';
//--------------------------------------------------------

$dataBase = new ConnectBase();
$view = new View();

try {
    $news = new News($dataBase->getTable());
} catch (Exception $ex) {
    echo $ex->getMessage();
}

foreach ($news->getNews() as $key => $new) {
    $view->assign($new->getId(), $new);
}
$view->display('tempMain.php');

?>
