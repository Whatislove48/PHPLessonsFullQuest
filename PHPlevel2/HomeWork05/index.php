<?php

require_once __DIR__ . '/../App/autoload.php';
spl_autoload_register('autoload');

$logger = new \App\Logger();

try {
    $ctrl = empty($_GET) ? 'ClientWebFour' : ($_GET['ctrl'] ?: 'ClientWebFour');
    $act = empty($_GET) ? 'showAllArticle' : ($_GET['act'] ?: 'showAllArticle');

    $class = '\App\Controllers\\' . $ctrl;

    $ctrl = new $class();

    if ($ctrl->access()) {
        $ctrl->action($act);
    }

} catch (\App\Exceptions\DbException $ex) {
    $logger->saveLog($ex);
    $ex->getAllInfo();
    die;
} catch (\App\Exceptions\NotFoundExpection $except) {
    $logger->saveLog($except);
    echo 'Message -> ' . $except->getMessage();
    die;
} catch (Throwable $e) {
    $logger->saveLog($e);
    echo 'Message -> ' . 'Error Controller';
    header('Location: index.php?ctrl=ClientWebFour&&act=showAllArticle');
    //die;
}





