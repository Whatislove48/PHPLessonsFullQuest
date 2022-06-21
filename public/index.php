<?php

require_once __DIR__ . '/../PHPlevel2/App/autoload.php';
spl_autoload_register('autoload');

//$uri = $_SERVER['REQUEST_URI'];
$uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);

try {
    $segments = explode('/',trim($uri,'/'));

    $ctrl = $segments[1] ?? 'ClientWebThird';
    $act = $segments[2] ?? 'showAllArticle';

    echo $ctrl.' <---------- CONTROLLER <br>';
    echo $act.' <---------- ACTION <br>';

    $class = '\App\Controllers\\' . $ctrl;

    echo '<hr>';

    $ctrl = new $class();
    $ctrl->action($act);

}
catch (Throwable $ex){
    $view = new \App\View\Views();
    $view->error = $ex;
    $view->display('Errors/errorWeb.php');
}

