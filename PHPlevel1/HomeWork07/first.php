<?php

require_once __DIR__.'/classes/Article.php';
require_once __DIR__.'/classes/View.php';
require_once __DIR__.'/classes/News.php';

$view = new View();

$temp = 'tempOne.php';
//$temp = 'tempTwo.php';

var_dump($view);

?>
<a href="upload.php?id=45" >
    <h1>
        First News
    </h1>
</a>
<?php
die;

include __DIR__ . '/templates/' . $temp;
//$view->display($temp);
//$view->render($temp);

echo '<br>-------------------------<br>';

echo 'var ====';
var_dump($_GET);

?>

