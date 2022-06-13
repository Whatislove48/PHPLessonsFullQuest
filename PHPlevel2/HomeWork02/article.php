<?php

require_once __DIR__ . '/../App/autoload.php';
spl_autoload_register('autoload');

if (!isset($_GET['id'])) {
    header('location: index.php');
}

$view = new \App\View\Views();
$bd = new \App\Db();

$id = $_GET['id'];
$sql = 'SELECT * FROM news WHERE id=:id';
$data[':id'] = $id;

$view->assign(0, ($bd->query($sql, '\App\Models\Article', $data)[0]));

$view->display('HW02/tempOneNew.php');

?>

<html lang="ru">
<a href="index.php">На главную</a>
</html>


