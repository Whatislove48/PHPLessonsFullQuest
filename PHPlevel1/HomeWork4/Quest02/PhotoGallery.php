<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallary</title>
</head>
<body>
<h1>
    Photo Gallery
</h1>

<img src="pictures/203256_900.jpg" width="150" height="150" alt="картинки">
<br>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="picture01">
    <button type="submit">Отправить</button>

</form>

<?php


echo '<br>';

$path = __DIR__ . "/pictures/";
//echo $path;
$root = scandir($path);
$len = count($root);
for ($i = 2; $i < $len; $i++) {
    $image = $root[$i];
    echo '<br>';

    ?>
    <img src=" pictures/<?= $image ?>" height="150" width="150" alt="чтото было">

    <?php
}
echo '<br>';
echo 'Конец галереи';
?>


</body>
</html>