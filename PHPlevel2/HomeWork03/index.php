<?php


require_once __DIR__ . '/../App/autoload.php';
spl_autoload_register('autoload');


echo 'Hey<br>';

$test = new \App\Models\UserRep();

foreach ($test->findAllUsers() as $user){
    var_dump($user);
    echo '<hr>';
}
echo '<hr>';

echo $test->findById(2)->getLogin();











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


