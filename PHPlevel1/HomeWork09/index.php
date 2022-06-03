<?php

require_once __DIR__ . '/autoload.php';
spl_autoload_register('autoload');

$cook = new \Application\Cookie();
$train = new \Application\Trains();
$gallary = new \Application\Gallary();

//$cook->setCookie('ABOBA','12345678');

$log = $_COOKIE['user'];
$pass = $_COOKIE['pass'];
$access = false;
$admin = false;

if ($cook->checkPassword($log, $pass)){
    $access = true;
    if('Boss' === $log || 'Admin' === $log){
        $admin = true;
    }
} ?>

<html>
<body>
<h1> Краснодар приветсвует Вас </h1>

<h4>Добрый день <?= $cook->getCurrentUser() ?><br>
    На данном сайте тебе предоставлены фотокарточки города
    и записи электричек чтобы поскорее уже свалить отсюда
</h4><br>

<?php
$allTrains = $train->getAllWay();
$allImage = $gallary->getAllPhotoName();

foreach ($allImage as $image) { ?>
    <img src="image/<?= $image ?>" height="200" width="200" alt="City">

<?php }

foreach ($allTrains as $trains) {
    echo '<hr>';
    echo $trains->getRoute();
}

if ($admin) { ?><br>
    <a href="gallary.php"> Редактировать галерею</a><br>
    <a href="trains.php"> Редактировать расписание</a>
<?php } ?>

<?php

if(!$access){?>
<hr> Авторизация <br>
<form action="login.php" method="post">
    <input type="text" name='user' placeholder="Логин" required minlength="3"><br>
    <input type="text" name='pass' placeholder="Пароль" required minlength="3"><br>
    <button type="submit"> Авторизация</button>
</form>

Не зарегистрированы? Тогда вам <br>
<a href="login.php"> На страницу регистрации</a><br>

<?php } ?>






</body>
</html>
