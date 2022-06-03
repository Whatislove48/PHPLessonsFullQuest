<?php

require_once __DIR__ . '/autoload.php';
spl_autoload_register('autoload');

$trains = new \Application\Trains();

$ways = $trains->getAllWay();

foreach ($ways as $way) {
    echo $way->getRoute();
    echo '<hr>';
} ?>

Изменение расписания
<form action="trains.php" method="post">
    <input type="number" name="id"> Номер отправления <br>
    <input type="text" name="route"> Маршрут <br>
    <input type="text" name="time"> Время отправления <br>
    <button type="submit"> Изменить</button>
    <br>
</form>

Удалить расписания
<form action="trains.php" method="post">
    <input type="number" name="delete"> Номер отправления <br>
    <button type="submit"> Delete train</button>
</form>

<?php
try {
    if (!empty($_POST['id'])) {
        $trains->editTrain($_POST['id'], $_POST['route'], $_POST['time']);
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



