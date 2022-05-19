<?php

//require_once __DIR__.'/Age.php';
//require_once __DIR__.'/Animal.php';
//require_once __DIR__.'/Type.php';
require_once __DIR__.'/classes/Pig.php';

$pig = new Pig(85,new Age(9));

if($pig->isPeppa() && $pig->isNeedKill()){
    echo 'Шаурма готова к разработке';
}

?>

<html lang="ru">
<a href="firstTest.php">На главную</a>
</html>
