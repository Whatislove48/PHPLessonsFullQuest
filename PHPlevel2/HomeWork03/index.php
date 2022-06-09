<?php

require_once __DIR__ . '/../App/autoload.php';
spl_autoload_register('autoload');


$cook = new \App\Models\Cookie();
//$cook->setCookie('Zeliboba', '1234');
$ctrl = new \App\Controllers\IndexFour();

if ($ctrl->access()) {
    $ctrl->action('showAllArticle');
}




