<?php

// Пример подключения автозагрузки

require_once __DIR__ . '/autoload.php';
spl_autoload_register('autoload');

$data = $_GET;

echo '<br>';

$sql = 'SELECT * FROM news';

$sql2 = "INSERT INTO news (author, title, text)
        VALUES ("."'".$data['author']."'".",
        "."'".$data['title']."'".",
        "."'".$data['text']."'".")";


var_dump($sql2);

$test = new \classes\Db();

$test->execute($sql2);

$all = $test->query($sql);

//$all = $test->UpQuery($sql,'\classes\Models\Article');

//var_dump($test->getAll());

echo '<br> -- END';

?>

<html lang="ru">
<a href="firstTest.php">На главную</a>
</html>
