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


//$textEn = 'Hello World!';
$textEn = 'Everybody dance now!';
//$textRu = 'Делу время потехе час';
//$textRu = 'Саша любит арбузы';
//$textRu = 'А я люблю дыни';
$textRu = 'Гидроэлектроизолятор';

$giveText = 'Делу время потехе час';
//$giveText[1][] = 'hy';
//$giveText[2][] = 'hello';
//$giveText[3][] = 'Everybody dance';

echo replaceBigRusWords($giveText);
die;


//echo replaceRusVowels($giveText);
die;











//======================================START of FUNCTION=================
//======================================================================

$rusWords = ['б' => 'Б', 'в' => 'В', 'г' => 'Г',
    'д' => 'Д', 'ж' => 'Ж', 'з' => 'З', 'й' => 'Й',
    'к' => 'К', 'л' => 'Л', 'м' => 'М', 'н' => 'Н',
    'п' => 'П', 'р' => 'Р', 'с' => 'С', 'т' => 'Т',
    'ф' => 'Ф', 'х' => 'Х', 'ц' => 'Ц', 'ч' => 'Ч',
    'ш' => 'Ш', 'щ' => 'Щ',];


$longWords = [];
$testArr = [];
echo '<br>--------TEST------------<br>';
$long = true;  //   это то же самое что и ФЛАГ
$j = 0;
$count = 0;
$i = 0;
$result = '';

//  111

while (isset($giveText[$i])) {   //  делаем из строки массивы
    if (' ' == $giveText[$i]) {
        $j += 1;
        //echo '<br>- на другое слово - <br>';
        $testArr[$j][0][] = $giveText[$i];
        $j += 1;
        $i += 1;
        continue;
    }
    //echo "   | j = $j  |  ";
    //echo '<br>- запись в массив  - ' . $giveText[$i] . '<br>';
    $testArr[$j][0][] = $giveText[$i];
    $i += 1;
}


// 222

for ($j = 0; $j < count($testArr); $j++) {
    $count = 0;
    while (isset($testArr[$j][0][$count])) { // подсчет колличества байт (тип символов) в дано
        if ($testArr[$j][0][$count] == ' ') {
            $long = true;   // теперь можно записать в массив длины
            //echo '<br> Замечeн пробел <br>';
            $longWords[$j] = false;
            break;
        }
        //echo '<br> -iteration-<br>';
        if ($long && 9 <= $count) {     // если слово длинное и не было записано
            $longWords[$j] = true;      // слово можно менять
            $long = false;
            //echo '<br>$long && 4 < $count<br>';
        } elseif ($long && 9 > $count) {
            $longWords[$j] = false;
        }
        //echo $testArr[$j][0][$count] . '<br>';
        $count += 1;
    }
}

// 333        Выше все готово ==  индекс слов совпадает с индексом длины
//                  если слово одобрено то его согласные переведу в регистр
// ..........................................................................
//                       КЛЮЧЕВЫЕ ПЕРЕМЕННЫЕ
// $longWords[$j] - хранит в соответствии со словом его доступ к увеличению
// $testArr[$j][0][$count] - хранит начальную строку разбитую на слова
// $rusWords - массив согласных, применять foreach
//


for ($j = 0; $j < count($testArr); $j++) {

    for ($count = 0; $count < count($testArr[$j][0]); $count += 2) {
        if ($longWords[$j]) {
            foreach ($rusWords as $small => $big) {
                if ($small == $testArr[$j][0][$count] .
                    $testArr[$j][0][$count + 1]) {
                    $result .= $big;
                    $count += 2;
                    continue;
                }
            }
        }
        $result .= $testArr[$j][0][$count] .
            $testArr[$j][0][$count + 1];
    }
}
//$resultPlus = '';
//
//$spaces = [];
//for ($i = 0; $i < count($testArr); $i++) {
//    if (' ' === $testArr[$i]) {
//        $spaces[] = $i;          // заполнение массива пробелов
//    }
//}
//
//for ($i = 0; $i < count($testArr); $i += 2) {
//    for ($j = 0; $j < count($spaces); $j++) {
//        $resultPlus .= ' ';
//        $i += 1;
//    }
//    $resultPlus .= $result[$i] . $result[$i + 1];
//}


var_dump($result);

var_dump($longWords);

die;


?>

</body>
</html>