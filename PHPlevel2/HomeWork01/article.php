<?php

require_once __DIR__ . '/autoload.php';
spl_autoload_register('autoload');

if (!isset($_GET['id'])) {
    header('location: http://localhost/PHPlevel2/HomeWork01/index.php');
}

$view = new \App\View\Views();

$bd = new \App\Db();

$id = $_GET['id'];
$sql = 'SELECT * FROM news WHERE id=:id';
$data[':id'] = $id;

$view->assign(0, ($bd->upQuery($sql, '\App\Models\Article', $data)[0]));

$view->display('tempOneNew.php');

?>


<html lang="ru">
<a href="index.php">На главную</a>
</html>


