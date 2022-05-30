<?php

// Пример подключения автозагрузки

require_once __DIR__ . '/autoload.php';
spl_autoload_register('autoload');


$test = new \classes\Db();

var_dump($test->getAll());

echo '<br> -- END';

?>

<html lang="ru">
<a href="firstTest.php">На главную</a>
</html>
