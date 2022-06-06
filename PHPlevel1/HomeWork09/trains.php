<?php

require_once __DIR__ . '/autoload.php';
spl_autoload_register('autoload');

$trains = new \Application\Trains();

$ways = $trains->getAllWay();

foreach ($ways as $way) {
    echo $way->getRoute();
    echo '<hr>';
} ?>

<h4>Изменение расписания</h4>
<form action="trains.php" method="post">
    <input type="number" name="id"> Номер отправления <br>
    <input type="text" name="route"> Маршрут <br>
    <input type="text" name="time"> Время отправления <br>
    <button type="submit"> Изменить</button>
    <br>
</form>
<hr>

<h4>Добавление расписания</h4>
<form action="trains.php" method="post">
    <input type="text" name="addRoute"> Маршрут <br>
    <input type="text" name="addTime"> Время отправления <br>
    <button type="submit"> Добавить</button>
    <br>
</form>
<hr>

<h4>Удалить расписания</h4>
<form action="trains.php" method="post">
    <input type="number" name="delete"> Номер отправления <br>
    <button type="submit"> Delete train</button>
</form>
<hr>
<?php
try {
    if (!empty($_POST['id'])) {
        $trains->editTrain($_POST['id'], $_POST['route'], $_POST['time']);
    }
    if (!empty($_POST['addRoute'])) {
        $trains->addTrain($_POST['addRoute'], $_POST['addTime']);
    }
    if (!empty($_POST['delete'])) {
        $trains->deleteTrain($_POST['delete']);
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
}
?>

<html lang="ru">
<a href="index.php"> На гдавную </a>
</html>



