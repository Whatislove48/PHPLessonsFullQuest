<?php

function autoload($className)
{
    //var_dump($className);
    require_once __DIR__ . '\\'.  $className . '.php';
}


