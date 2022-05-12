<?php


require_once __DIR__ . '/function.php';


?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no,
          initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ShowBook</title>
</head>
<body>
<h1>
    Guest Book config
</h1>
<?php
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
$textRu = 'Делу время потехе час';
$countEn = 0;
$countRu = 0;

var_dump($textRu);


while (isset($textRu[$countRu])) {
    $countRu += 1;
}
for ($i = 0; $i < $countRu; $i += 2) {
    if (($i + 2) == $countRu) {
        echo '||||||||||||||||||||||||||||||||||';
        echo $textRu[$countRu-1] . $textRu[$countRu];
        break;
    }
    echo $textRu[$i] . $textRu[$i+1];
}

$test = replaceRusVowels($textRu);

var_dump($test);

////var_dump(replaceRusVowels($textRu));
//$test = replaceRusVowels($textRu);
//
//foreach ($test as $word){
//    echo $word;
//}

die;


?>

</body>
</html>