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
//$textRu = 'Делу время потехе час';
$textRu = 'Саша любит арбузы';
$countEn = 0;
$countRu = 0;


$enWords = ['b' => 'B', 'c' => 'C', 'd' => 'D',
    'f' => 'F', 'g' => 'G', 'h' => 'H', 'j' => 'J', 'k' => 'K',
    'l' => 'L', 'm' => 'M', 'n' => 'N', 'p' => 'P', 'q' => 'Q',
    'r' => 'R', 's' => 'S', 't' => 'T', 'v' => 'V', 'w' => 'W',
    'Y' => 'Y', 'z' => 'Z',];

$enWordsVow = ['a' => 'A', 'e' => 'E', 'i' => 'I',
    'o' => 'O', 'u' => 'U'];


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


//$test22 = 'гавно';
//$countest = 0;
//while (isset($test22[$countest])) { //подсчет массива (без пробелов он всегда четный)
//    $countest++;
//}
//
//
//$test228 = [];
//for ($i = 0; $i < $countest; $i++) {
//    $test228[] = $test22[$i];
//}
//
//                //ТЕСТИРОВАТЬ
//for ($i = 0; $i < (count($test228) - 1); $i += 2) {
//    foreach ($rusWordsVow as $small => $big) {
//        if ($test228[$i] . $test228[$i + 1] == $small
//            || $test228[$i] . $test228[$i + 1] == $big) {
//            echo $test228[$i] . $test228[$i + 1].
//                ' ну типо ранво '.$big . '|| '. $small ;
//            echo '<br>';
//        }
//    }
//}
//
//die;


//foreach ($testing as $test) {
//    $flag = false;
//    echo '<br> TEST ==== '. $test;
//    if ($test == ' ') {
//        $res = $res . $test;
//        $flag = false;
//        //echo $test;
//        echo ' $i = ' . $i . '$test == (space)';
//    }
//    foreach ($rusWords as $small => $big) {
//        if ($test == $small || $test == $big) {
//            $flag = true;                          //    согласная записана
//            $trash = $test;
//            $res = $res . $test;
//            echo ' $i = ' . $i . '$test == $small || $big';
//            echo '<br>  ----------------standart Words------------------<br>';
//        }
//    }
//    if ($flag) {
//        foreach ($rusWordsVow as $smallVow => $bigVow) {
//            if ($test == $smallVow || $test == $bigVow) {  // если встретилась гласная
//                $res = $res . $trash;
//                echo ' $i = ' . $i . '$test == $smallVow || $bigVow';
//            }
//        }
//    }
//    $i++;
//}
//
//var_dump($res);
//echo $res;

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$res = '';
$consWord = '';
$trash = '';
$flag = false;
$i = 0;


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

for ($i = 0; $i < $countRu; $i++) {
    $testing[] = $textRu[$i];
}
//==================================================================================
echo '<br>';
$testRes = '';
for ($i = 0; $i < $countRu ; $i += 2) {
    for ($j = 0; $j < count($spaces); $j++) {
        if ($i == $spaces[$j]) {
            $result[] = ' ';
            $testRes .= ' ';
            $i += 1;
            $flag = false;
            //continue;
            $consWord = ''; // Индекс попал на пробел
            echo '<br>' . ($i - 1) . '=' . $spaces[$j] . '<br>';
        }
    }
    echo $i . ' = ITERATION >>>>>>>>>>';
    foreach ($rusWords as $small => $big) {
        if ($testing[$i] . $testing[$i + 1] === $small ||
            $testing[$i] . $testing[$i + 1] === $big) {
            $flag = true;                             // открытие доступа к гласной
            $consWord = $testing[$i] . $testing[$i + 1];  // Согласная записана
            echo '<br> -- Согласная записана <br>';
            $testRes .= $consWord;
        }
    }

    if ($flag) {  //  если согласная была записана
        foreach ($rusWordsVow as $smallVow => $bigVow) {                //
            if ($testing[$i] . $testing[$i + 1] === $smallVow ||
                $testing[$i] . $testing[$i + 1] === $bigVow) {
                $testing[$i] . $testing[$i + 1] = $consWord;
                echo '<br> -- Гласная записана <br>';
                $testRes .= $consWord;
                $flag = false;
            }
        }
    }
    else{
        $testRes .= $testing[$i] . $testing[$i + 1];
        echo '<br> -- текущая записана <br>';
    }
}
//==================================================================================
var_dump($textRu);
var_dump($testRes);

echo '<br>';


die;
echo '<br>';


?>

</body>
</html>