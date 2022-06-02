<?php

require_once __DIR__ . '/autoload.php';
spl_autoload_register('autoload');

$cook = new \Application\Cookie();
$testDb = new \Application\Db();
$train = new \Application\Trains();
$gallary = new \Application\Gallary();

$pass = 'a0a5c818517bbcc5303847645e27022c970dc73b';
$log = 'Boss';

$way = 'Краснодар -> Староминская';
$time = '09:32';

$all = $train->getAllWay();

?>

<html>

<body>
<h1> Краснодар приветсвует Вас </h1>

<h4>Добрый день читатель<br>
    На данном сайте тебе предоставлены фотокарточки города
    и записи электричек чтобы поскорее уже свалить отсюда
</h4><br>

<?php

$allImage = $gallary->getAllPhotoName();

foreach ($allImage as $image) {
    ?>
    <img src="image/<?= $image ?>" height="200" width="200" alt="City">

<?php }

if ($cook->checkPassword($_COOKIE['user'], $_COOKIE['pass'])) {
    echo 'ABOBA';
    ?>
    <a href="gallary.php"> Редактировать галерею</a>
    <?php
}
?>

<?php

//Bossqwerty

?>


</body>
</html>
