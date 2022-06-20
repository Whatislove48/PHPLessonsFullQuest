<?php


require_once __DIR__ . '/../App/autoload.php';
spl_autoload_register('autoload');

//var_dump($_SERVER['REQUEST_URI']);
$uri = $_SERVER['REQUEST_URI'];
$parts = explode('/',$uri);

var_dump($parts);

$ctrl = $parts[4] ?: 'ClientWebFirst';
$act = $parts[5] ?: 'showAllArticle';

$class = '\App\Controllers\\' . $ctrl;
$ctrl = new $class();
$ctrl->action($act);

die;

echo '<br>';









//catch (\App\Exceptions\DbException $exDb){
//    echo $exDb->getMessage().'<br>';
//    echo $exDb->getQuery().'<br>';
//}
//catch (\App\Exceptions\NotFoundExpection $exNot){
//    echo $exNot->getMessage().'<br>';
//    echo $exNot->getFile().'<br>';
//    echo $exNot->getLine().'<br>';
//}
//catch (Throwable $ex){
//    echo $ex->getMessage().'<br>';
//    echo $ex->getFile().'<br>';
//    echo $ex->getLine().'<br>';
//}


//$test = new \App\Models\User('Vitaly','1337');
////var_dump($test);die;
//foreach ($test->getAllUsers() as $item) {
//    var_dump($item->getLogin());
//    echo '<hr>';
//}
//
//
//try {
//    $ctrl = empty($_GET) ? 'ClientWebFour' : ($_GET['ctrl'] ?: 'ClientWebFour');
//    $act = empty($_GET) ? 'showAllArticle' : ($_GET['act'] ?: 'showAllArticle');
//
//    $class = '\App\Controllers\\' . $ctrl;
//
//    $ctrl = new $class();
//
//    if ($ctrl->access()) {
//        $ctrl->action($act);
//    }
//
//} catch (Exception $ex){
//    echo $ex->getMessage();
//}
//
//


