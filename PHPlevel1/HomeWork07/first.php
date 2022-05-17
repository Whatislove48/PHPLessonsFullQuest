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


//include __DIR__.'/templates/tempOne.php';
$view->display($temp);

?>
<div style="background-color: #d90f0f">
    <p>Проверка дива</p>
</div>

<a href="upload.php?id=<?php  echo 25?>">
    <h1>
        First News
    </h1>
</a>
