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
    <title>Friday</title>
</head>
<body>
<h1>
    String conf
</h1>
<?php
//echo '<br> ____START____ <br>';


//$arrayA = [8, -4, 0, 3, 1, 16, 42, 13, -41, 33, 61, 12];
//$arrayB = [11, -41, 33, 8, 2, 16, 14, 95, 11, 7];

//$arrayA = [6, 13, 5];
//$arrayB = [8, 10, 12];


//$test = arrayDiff($arrayA, $arrayB); //ar
//$test1 = arrayConver($arrayA, $arrayB); //ar
//$test2 = sortArray($arrayA, $arrayB);  //ar
//$test3 = sumElements($arrayA);  // fl
//$test4 = sumTwoElements($arrayB); // ar

//============================================
//$textEn = 'Hello World!';
$textEn = 'Everybody dance now!';
$textRu = 'Делу время потехе час';
$countEn = 0;
$countRu = 0;




$rusWordsVow = ['а' => 'А', 'и' => 'И', 'е' => 'Е',
    'ё' => 'Ё', 'о' => 'О', 'у' => 'У',
    'ы' => 'Ы', 'э' => 'Э', 'ю' => 'Ю',
    'я' => 'Я'];

$rusWords = ['б' => 'Б', 'в' => 'В', 'г' => 'Г',
    'д' => 'Д', 'ж' => 'Ж', 'з' => 'З', 'й' => 'Й',
    'к' => 'К', 'л' => 'Л', 'м' => 'М', 'н' => 'Н',
    'п' => 'П', 'р' => 'Р', 'с' => 'С', 'т' => 'Т',
    'ф' => 'Ф', 'х' => 'Х', 'ц' => 'Ц', 'ч' => 'Ч',
    'ш' => 'Ш', 'щ' => 'Щ',];

var_dump($textRu);
echo '<br>   ----------------TITLE--------------------------';

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

while (isset($textRu[$countRu])) { //подсчет массива (без пробелов он всегда четный)
    $countRu++;
}

$testing = []; //        массив из строки
$spaces = []; //         массив с позициями пробелов
$arrayDontSpace = []; // массив без пробелов _____ ВСЕГДА ЧЕТНЫЙ _____
$result = [];   //       Итоговый массив
for ($i = 0; $i < $countRu; $i++) {
    if ($textRu[$i] == ' ') {
        $spaces[] = $i;          // заполнение массива пробелов
    } else {
        $arrayDontSpace[] = $textRu[$i];  // заполнение массива без пробелов
    }
}

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

var_dump($spaces);
echo '<br> --space-- <br>';

for ($i = 0; $i < $countRu; $i++) {
    $testing[] = $textRu[$i];
}

var_dump($spaces);
$consWord = '';
for ($i = 0; $i < $countRu - 1; $i += 2) {
    $flag = false;
    for ($j = 0; $j < count($spaces); $j++) {
        if ($i = $spaces[$j]) {
            $result[] = ' ';
            $i += 1;
            $consWord = ''; // Индекс попал на пробел
        }
    }
    foreach ($rusWords as $small => $big) {
        if ($testing[$i] . $testing[$i + 1] === $small || $big) {
            $flag = true;                             // открытие доступа к гласной
            $consWord = $testing[$i] . $testing[$i + 1];  // Согласная записана
        }
    }

    if ($flag) {  //  если согласная была записана
        foreach ($rusWordsVow as $smallVow => $bigVow) {                //
            if ($testing[$i] . $testing[$i + 1] === $smallVow || $bigVow) {
                $testing[$i] . $testing[$i + 1] = $consWord;

            }
        }
    }
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

var_dump($testing);

echo '<br>';


die;
echo '<br>';
$test = replaceRusVowels($textRu);

echo '<br>';
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