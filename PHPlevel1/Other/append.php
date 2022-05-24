<?php


require_once __DIR__ . '/autoload.php';
spl_autoload_register('autoload');



$article = new \classes\Article('Boba','Obosralsya','Fuking sheet');

echo $article->getAll();

echo '<br>';
echo $article->getAll();


?>

<html lang="ru">
<a href="firstTest.php">На главную</a>
</html>
