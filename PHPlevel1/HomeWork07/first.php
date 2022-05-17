<?php

require_once __DIR__ . '/classes/Article.php';
require_once __DIR__ . '/classes/View.php';
require_once __DIR__ . '/classes/News.php';

$data = [];
$text = __DIR__ . '/datafiles/testNews.txt';
$full = file($text, FILE_IGNORE_NEW_LINES);



$j = -1;
$flag = true;
$index = false;
for ($i = 0; isset($full[$i]); $i++) {
    if (trim($full[$i]) === '') {
        $j += 1;
        $i+=1;
        $flag = true;
        continue;
    }
    echo '<br>--------iteration-------<br>';
    if ($flag) {             // title
        $data[$j]['title'] = $full[$i];
        $flag = false;
        echo '<br>-тема записана-<br>';
        continue;
    }
    $data[$j][] = $full[$i];
}

$count = $j;
for ($j = 0;$j<$count+1;$j++){
    foreach ($data[$j]as $line){
        echo $line;
    }
    echo '<br>';
}

var_dump($data);

die;

$view = new View();

$temp = 'tempOne.php';
//$temp = 'tempTwo.php';

var_dump($view);

?>
<div style="background-color: #d90f0f">
    <p>Проверка дива</p>
</div>

<a href="upload.php?id=45">
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

