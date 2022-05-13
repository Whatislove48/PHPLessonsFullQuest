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

$giveText = 'Everybody dance now!';
//$giveText[1][] = 'hy';
//$giveText[2][] = 'hello';
//$giveText[3][] = 'Everybody dance';

//======================================START of FUNCTION=================
//======================================================================

$rusWords = ['б' => 'Б', 'в' => 'В', 'г' => 'Г',
    'д' => 'Д', 'ж' => 'Ж', 'з' => 'З', 'й' => 'Й',
    'к' => 'К', 'л' => 'Л', 'м' => 'М', 'н' => 'Н',
    'п' => 'П', 'р' => 'Р', 'с' => 'С', 'т' => 'Т',
    'ф' => 'Ф', 'х' => 'Х', 'ц' => 'Ц', 'ч' => 'Ч',
    'ш' => 'Ш', 'щ' => 'Щ',];

$enWords = ['b' => 'B', 'c' => 'C', 'd' => 'D',
    'f' => 'F', 'g' => 'G', 'h' => 'H', 'j' => 'J', 'k' => 'K',
    'l' => 'L', 'm' => 'M', 'n' => 'N', 'p' => 'P', 'q' => 'Q',
    'r' => 'R', 's' => 'S', 't' => 'T', 'v' => 'V', 'w' => 'W',
    'Y' => 'Y', 'z' => 'Z',];


$longWords = [];
$testArr = [];
var_dump($giveText);
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
        if ($long && 4 <= $count) {     // если слово длинное и не было записано
            $longWords[$j] = true;      // слово можно менять
            $long = false;
            //echo '<br>$long && 4 < $count<br>';
        } elseif ($long && 4 > $count) {
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

    for ($count = 0; $count < count($testArr[$j][0]); $count++) {
        if ($longWords[$j]) {
            foreach ($enWords as $small => $big) {
                if ($small == $testArr[$j][0][$count]) {
                    $result .= $big;
                    $count += 1;
                    continue;
                }
            }
        }
        $result .= $testArr[$j][0][$count];
    }
}
var_dump($result);

var_dump($longWords);
echo '== <br>+++++++++';


die;

$long = 0;
$trash = 0;


echo replaceBigRusWords($textRu);


?>

</body>
</html>