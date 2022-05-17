<?php

require_once __DIR__ . '/classes/Article.php';
require_once __DIR__ . '/classes/View.php';
require_once __DIR__ . '/classes/News.php';

$news = new News();
$view = new View();
$temp = 'tempOne.php';

foreach ($news->getNews() as $key => $new) {
    $view->assign($key, $new);
}


$view->display($temp);

?>
<div style="background-color: #0f71d9">
    <p>Синий текст</p>
</div>

