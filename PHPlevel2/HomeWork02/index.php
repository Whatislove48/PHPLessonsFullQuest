<?php

require_once __DIR__ . '/../App/autoload.php';
spl_autoload_register('autoload');



try {
    $ctrl = empty($_GET) ? 'ClientWebSecond' : ($_GET['ctrl'] ?: 'ClientWebSecond');
    $act = empty($_GET) ? 'showAllArticle' : ($_GET['act'] ?: 'showAllArticle');

    $class = '\App\Controllers\\' . $ctrl;

    $ctrl = new $class();
    $ctrl->action($act);

}
catch (Exception $ex){
    echo $ex->getMessage();
}
catch (Throwable $e) {
    header('Location: index.php?ctrl=ClientWebSecond&&act=showAllArticle');
    exit;
}






