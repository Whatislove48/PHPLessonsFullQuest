<?php


//------------------------COMPLETE---------------------------------
function arrayDiff(array $arrayA, array $arrayB): array
{
    $arrayC = [];
    $lenA = count($arrayA);
    $lenB = count($arrayB);
    for ($i = 0; $i < $lenA; $i++) {
        $flag = 0;
        for ($j = 0; $j < $lenB; $j++) {
            if ($arrayA[$i] == $arrayB[$j]) {
                $flag = 0;
                break;
            } elseif ($arrayA[$i] != $arrayB[$j]) {
                $flag = 1;
            }
        }
        if ($flag == 1) {
            $arrayC[] = $arrayA[$i];
        }
    }
    return $arrayC;
}

//==================================================================


//------------------------COMPLETE---------------------------------
function arrayConver(array $arrayA, array $arrayB): array
{
    $arrayC = [];
    $lenA = count($arrayA);
    $lenB = count($arrayB);
    for ($i = 0; $i < $lenA; $i++) {
        $flag = 0;
        for ($j = 0; $j < $lenB; $j++) {
            if ($arrayA[$i] != $arrayB[$j]) {
                $flag = 0;
            } elseif ($arrayA[$i] == $arrayB[$j]) {
                $flag = 1;
                break;
            }
        }
        if ($flag == 1) {
            $arrayC[] = $arrayA[$i];
        }
    }
    return $arrayC;
}

//==================================================================

//------------------------COMPLETE---------------------------------
function sortArray(array $arrayA, array $arrayB): array
{
    $arrayC = [];
    $arrayD = [];
    $bigger = 0;
    $smaller = 0;
    foreach ($arrayA as $rec) {
        $arrayC[] = $rec;
    }
    foreach ($arrayB as $rec) {
        $arrayC[] = $rec;
    }   //                            Сортировка
    $lenC = count($arrayC);


    for ($i = 0; $i < $lenC; $i++) {
        for ($j = 1; $j < $lenC; $j++) {
            if ($arrayC[$j - 1] < $arrayC[$j]) {
                $bigger = $arrayC[$j];
                $arrayC[$j] = $arrayC[$j - 1];
                $arrayC[$j - 1] = $bigger;
            }
        }
    }
    return $arrayC;
}

//------------------------COMPLETE---------------------------------
function sumElements(array $array): float
{
    $result = 0;
    foreach ($array as $num) {
        if ($num % 2 == 0 && $num > 0) {
            $result += $num;
        }
    }
    return $result;
}

//==================================================================

function sumTwoElements(array $array): array
{
    $len = count($array);
    for ($i = 2; $i < $len; $i++) {
        $array[$i] = $array[$i - 1] + $array[$i - 2];
    }
    return $array;
}

//==================================================================
//------------------------COMPLETE---------------------------------

function replaceEnVowels(string $text): string
{
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

    $count = 0;
    $result = '';

    while (isset($text[$count])) {
        $count += 1;
    }

    $mass = [];
    for ($i = 0; $i < $count; $i++) {
        $mass[] = $text[$i];
    }

    for ($i = 1; $i < $count; $i++) {
        foreach ($enWordsVow as $small => $big) {
            if ($small === $mass[$i]) {
                foreach ($enWords as $smallW => $bigW) {
                    if ($smallW === $mass[$i - 1] ||
                        $bigW === $mass[$i - 1]) {
                        $mass[$i] = $mass[$i - 1];
                    }
                }
            }
        }
    }

    foreach ($mass as $str) {
        $result .= $str;
    }

    return $result;
}

//==================================================================
//------------------------COMPLETE---------------------------------

function replaceRusVowels(string $text): string
{

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

    $count = 0;
    $consWord = '';
    $flag = false;
    $result = '';
    $spaces = [];

    while (isset($text[$count])) {
        $count += 1;
    }

    for ($i = 0; $i < $count; $i++) {
        if (' ' === $text[$i]) {
            $spaces[] = $i;          // заполнение массива пробелов
        }
    }

    for ($i = 0; $i < $count; $i++) {
        $givenText[] = $text[$i];
    }

    for ($i = 0; $i < $count; $i += 2) {
        for ($j = 0; $j < count($spaces); $j++) {
            if ($i === $spaces[$j]) {
                $result .= ' ';
                $i += 1;
                $flag = false;
                $consWord = ''; // Индекс попал на пробел
            }
        }
        foreach ($rusWords as $small => $big) {
            if ($givenText[$i] . $givenText[$i + 1] === $small ||
                $givenText[$i] . $givenText[$i + 1] === $big) {
                $flag = true;                             // открытие доступа к гласной
                $consWord = $givenText[$i] . $givenText[$i + 1];  // Согласная записана
                $result .= $consWord;
            }
        }

        if ($flag) {  //  если согласная была записана
            foreach ($rusWordsVow as $smallVow => $bigVow) {
                if ($givenText[$i] . $givenText[$i + 1] === $smallVow ||
                    $givenText[$i] . $givenText[$i + 1] === $bigVow) {
                    $givenText[$i] . $givenText[$i + 1] = $consWord;
                    $result .= $consWord;
                    $flag = false;
                }
            }
        } else {
            $result .= $givenText[$i] . $givenText[$i + 1];
        }
    }

    return $result;
}

//==================================================================

function replaceBigRusWords(string $text): string
{

    $rusWords = ['б' => 'Б', 'в' => 'В', 'г' => 'Г',
        'д' => 'Д', 'ж' => 'Ж', 'з' => 'З', 'й' => 'Й',
        'к' => 'К', 'л' => 'Л', 'м' => 'М', 'н' => 'Н',
        'п' => 'П', 'р' => 'Р', 'с' => 'С', 'т' => 'Т',
        'ф' => 'Ф', 'х' => 'Х', 'ц' => 'Ц', 'ч' => 'Ч',
        'ш' => 'Ш', 'щ' => 'Щ',];

    $result = '';
    $count = 0;
    $consWord = '';
    $flag = false;
    $spaces = [];
    $longWords = [];
    $long = 0;

    while (isset($text[$count])) { // подсчет колличества байт (тип символов) в дано
        $count += 1;
    }

    for ($i = 0; $i < $count; $i++) {
        if (' ' === $text[$i]) {
            $spaces[] = $i;          // заполнение массива пробелов и длины слов
            $long = 0;
        } else {
            $long += 1;
        }

    }
    if(0 === count($longWords)){
        $index = $long;
    }

    for ($i = 0; $i < $count; $i++) {
        $givenText[] = $text[$i];
    }

    for ($i = 0; $i < $count; $i += 2) {
        for ($j = 0; $j < count($spaces); $j++) {
            if ($i === $spaces[$j]) {
                $result .= ' ';
                $i += 1;
                $flag = false;
                $consWord = ''; // Индекс попал на пробел
            }
        }
        foreach ($rusWords as $small => $big) {
            if ($givenText[$i] . $givenText[$i + 1] === $small ||
                $givenText[$i] . $givenText[$i + 1] === $big) {
                $flag = true;                             // открытие доступа к гласной
                $consWord = $givenText[$i] . $givenText[$i + 1];  // Согласная записана
                $result .= $consWord;
            }
        }

        if ($flag) {  //  если согласная была записана
            foreach ($rusWordsVow as $smallVow => $bigVow) {
                if ($givenText[$i] . $givenText[$i + 1] === $smallVow ||
                    $givenText[$i] . $givenText[$i + 1] === $bigVow) {
                    $givenText[$i] . $givenText[$i + 1] = $consWord;
                    $result .= $consWord;
                    $flag = false;
                }
            }
        } else {
            $result .= $givenText[$i] . $givenText[$i + 1];
        }
    }


    return $result;
}

//==================================================================

?>
