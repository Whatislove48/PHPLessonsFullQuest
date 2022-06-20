<?php

require_once __DIR__ . '/../PHPlevel2/App/autoload.php';
spl_autoload_register('autoload');

//---------------------------------------------------
$uri = $_SERVER['REQUEST_URI'];

//$uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
echo ' '. $uri .' <-- URI  <br>';
try {
    $segments = explode('/',trim($uri,'/'));

    echo '<hr>';
    var_dump($segments);
    echo ' <---SEGMENTS <hr>';

    echo '<hr>';

    $ctrl = $segments[1] ?? 'ClientWebThird';
    $act = $segments[2] ?? 'showAllArticle';
    $value = $segments[3] ?? null;

    echo $ctrl.' <---------- CONTROLLER <br>';
    echo $act.' <---------- ACTION <br>';

    $class = '\App\Controllers\\' . $ctrl;

    echo $class.' <---------- CLASS <br>';
    echo '<hr>';

    $ctrl = new $class();
    $ctrl->action($act);

}
catch (Throwable $ex){
    $view = new \App\View\Views();
    $view->error = $ex;
    $view->display('Errors/errorWeb.php');
}

