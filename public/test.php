<?php


$hello = function ($name) {
    return 'Hellow ' . $name;
};


function sum(...$args){
    $sum = 0;
    foreach ($args as $val){
        $sum += $val;
    }

    return $sum;

}


$test = [12,34,65,890,12,23,345,56];
var_dump(...$test);

echo sum(12,234,546,2);
