<?php

// Пример построения функции автозагрузки

function autoload($className)
{
    require_once __DIR__ . '/' . str_replace('\\',
            '/',
            $className) . '.php';
}

