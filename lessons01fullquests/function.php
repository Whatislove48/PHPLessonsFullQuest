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

function replaceEnVowels(string $text) :array
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

    $countEn = 0;
    $countRu = 0;

    while (isset($text[$countEn])) {
        $countEn += 1;
    }
    while (isset($text[$countRu])) {
        $countRu += 1;
    }

    $mass = [];
    for ($i = 0; $i < $countEn; $i++) {
        $mass[] = $text[$i];
    }

    for ($i = 1; $i < $countEn; $i++) {
        foreach ($enWordsVow as $small => $big) {
            if ($small === $mass[$i]) {
                foreach ($enWords as $smallW => $bigW) {
                    if ($smallW === $mass[$i-1] ||
                        $bigW === $mass[$i-1]){
                        $mass[$i] = $mass[$i-1];
                    }
                }
            }
        }
    }

    return $mass;
}

//==================================================================





//==================================================================

?>
