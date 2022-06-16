<?php

require_once __DIR__ . '/../App/autoload.php';
spl_autoload_register('autoload');


// explode(string $separator, string $string, int $limit = PHP_INT_MAX): array

try {
    $ctrl = empty($_GET) ? 'ClientWebFirst' : ($_GET['ctrl'] ?: 'ClientWebFirst');
    $act = empty($_GET) ? 'showAllArticle' : ($_GET['act'] ?: 'showAllArticle');

    $class = '\App\Controllers\\' . $ctrl;
    $ctrl = new $class();
    $ctrl->action($act);

} catch (\App\Exceptions\DbException $ex) {
    $ex->getAllInfo();
    exit;
} catch (\App\Exceptions\NotFoundExpection $except) {
    echo 'Message -> ' . $except->getMessage();
    echo '<br> File -> ' . $except->getFile();
    echo '<br> Line -> ' . $except->getLine();
    exit;
} catch (Throwable $e) {
    header('Location: index.php?ctrl=ClientWebFirst&&act=showAllArticle');
    exit;
}

