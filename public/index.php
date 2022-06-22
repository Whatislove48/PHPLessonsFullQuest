<?php

require_once __DIR__ . '/../PHPlevel2/App/autoload.php';

$uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);

try {
    $segments = explode('/',trim($uri,'/'));

    $ctrl = $segments[1] ?? 'ClientWebThird';
    $act = $segments[2] ?? 'showAllArticle';
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

