<?php

require_once __DIR__ . '/function.php';

//echo '<br> ____START____ <br>';


$arrayA = [8, -4, 0, 3, 1, 16, 42, 13, -41, 33, 61, 12];
$arrayB = [11, -41, 33, 8, 2, 16, 14, 95, 11, 7];

//$arrayA = [6, 13, 5];
//$arrayB = [8, 10, 12];


$test = arrayDiff($arrayA, $arrayB); //ar
$test1 = arrayConver($arrayA, $arrayB); //ar
$test2 = sortArray($arrayA, $arrayB);  //ar
$test3 = sumElements($arrayA);  // fl
$test4 = sumTwoElements($arrayB); // ar

//============================================
//$textEn = 'Hello World!';
$textEn = 'Everybody dance now!';
$text1 = 'Делу время потехе час';
$countEn = 0;
$countRu = 0;



var_dump(replaceEnVowels($textEn));

die;


?>
