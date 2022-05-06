<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Выбранное изображение</title>
</head>
<body>
<?php

require_once __DIR__. '/functions.php';

echo '<br>';
//var_dump($_GET['id']);

$id = $_GET['id'];

echo showImages($id);

?>

</body>
</html>
