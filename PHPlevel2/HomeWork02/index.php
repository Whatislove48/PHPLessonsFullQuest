<?php

require_once __DIR__ . '/autoload.php';
spl_autoload_register('autoload');


$test = new \App\Models\Article();

$all = \App\Models\Article::findAll();


$test->setArticle('Oleg','Tired','Oleg is very tired man ');

$test->insert();

