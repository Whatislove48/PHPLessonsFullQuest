<?php




function showCalculate(int $fist, int $second, string $operation)
{
    //var_dump(!isset($second));
    if (!isset($second)) {echo 'Num not found';die;}
    if (!isset($fist)) {echo 'Num not found';die;}
    if (!isset($operation)) {echo 'Operator not found';die;}


    if ($fist != false and $second != false and $operation != false) {
        if ($operation === '/') {
            return $fist / $second;
        }
        if ($operation === '*') {
            return $fist * $second;
        }
        if ($operation === '+') {
            return $fist + $second;
        }
        if ($operation === '-') {
            return $fist - $second;
        } else {
            return 'Invalid operator ';
        }
    } else {
        return 'Error -2';
    }
}




