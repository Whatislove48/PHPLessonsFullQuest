<?php

require_once __DIR__ . '/../App/autoload.php';
spl_autoload_register('autoload');


$test = new \App\Models\User('Vitaly','1337');
//var_dump($test);die;
foreach ($test->getAllUsers() as $item) {
    var_dump($item->getLogin());
    echo '<hr>';
}



die;


try {
    $ctrl = empty($_GET) ? 'ClientWebFour' : ($_GET['ctrl'] ?: 'ClientWebFour');
    $act = empty($_GET) ? 'showAllArticle' : ($_GET['act'] ?: 'showAllArticle');

    $class = '\App\Controllers\\' . $ctrl;

    $ctrl = new $class();

    if ($ctrl->access()) {
        $ctrl->action($act);
    }

} catch (Exception $ex){
    echo $ex->getMessage();
}




