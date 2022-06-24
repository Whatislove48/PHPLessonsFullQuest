<?php

require_once __DIR__ . '/../PHPlevel2/App/autoload.php';

$uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);

try {
    $segments = explode('/',trim($uri,'/'));
    var_dump($segments);echo '<hr>';
    $ctrl = $segments[2] ?? 'ClientWebThird';
    echo 'CONTROLLER ->' . $ctrl. '<hr>';
    $act = $segments[3] ?? 'showAllArticle';
    echo 'ACTION ->' . $act. '<hr>';
    $class = '\App\Controllers\\' . $ctrl;

    echo '<hr>';
    $ctrl = new $class();
    $ctrl->action($act);
}
catch (Throwable $ex){
    $log = new \App\PsrLog();
    $log->error('Er', $log->getContext($ex));
    $view = new \App\View\Views();
    $view->error = $ex;
    $view->display('Errors/errorWeb.php');
}

