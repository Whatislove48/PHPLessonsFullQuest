<?php

require_once __DIR__ . '/../App/autoload.php';
spl_autoload_register('autoload');

$ctrl = new \App\Controllers\ClientWebFour();

try {
    $ctrl->action('showArticle');
}
catch (Exception $ex){
    echo $ex->getMessage();
}


