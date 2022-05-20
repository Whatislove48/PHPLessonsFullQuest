<?php

//require_once __DIR__.'/Age.php';
//require_once __DIR__.'/Animal.php';
//require_once __DIR__.'/Type.php';
require_once __DIR__.'/classes/TestOne.php';
//require_once __DIR__.'/classes/TestInterface.php';
require_once __DIR__.'/classes/IntClass.php';
require_once __DIR__.'/classes/Baby.php';
require_once __DIR__.'/classes/SmallBaby.php';

$aboba = new SmallBaby('Ziliboba',1337);

echo $aboba->getAll();  // TestOne
echo'<br>';
//echo $aboba->someMethod(); // interface
echo $aboba->getSmall(); //   abstract

die;

require_once __DIR__.'/classes/Pig.php';

$pig = new Pig(85,new Age(9));

if($pig->isPeppa() && $pig->isNeedKill()){
    echo 'Шаурма готова к разработке';
}

?>

<html lang="ru">
<a href="firstTest.php">На главную</a>
</html>
