<?php

require_once __DIR__ . '/../App/autoload.php';
spl_autoload_register('autoload');



try {
    $ctrl = empty($_GET) ? 'ClientWebFour' : ($_GET['ctrl'] ?: 'ClientWebFour');
    $act = empty($_GET) ? 'showAllArticle' : ($_GET['act'] ?: 'showAllArticle');

    $class = '\App\Controllers\\' . $ctrl;

    $ctrl = new $class();

    if ($ctrl->access()) {
        $ctrl->action($act);
    }

} catch (\App\Exceptions\DbException $ex){
    echo $ex->getMessage();
    die;
}




