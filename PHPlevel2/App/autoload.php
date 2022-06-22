<?php

//function autoload($className)
//{
//    require_once __DIR__ . '/../' . str_replace('\\',
//            '/',
//            $className) . '.php';
//}

require __DIR__.'/../../vendor/autoload.php';

spl_autoload_register(function ($className){
    require_once __DIR__ . '/../' . str_replace('\\',
            '/',
            $className) . '.php';
});

