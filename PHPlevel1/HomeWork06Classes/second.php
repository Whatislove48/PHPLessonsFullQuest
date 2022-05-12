<?php

require_once __DIR__.'/classes/Uploader.php';

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no,
          initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Class</title>
</head>
<body>

<h1>Задание №2 Upload Class</h1>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="upload">
    <button type="submit">Загрузить фото</button>
</form>


<?php



echo isset($_POST);
echo '<br>';
var_dump(isset($_POST));

var_dump($_POST);

echo '<br>-------------';
var_dump(empty($_POST));
echo '<br>-------------';

die;


?>

</body>
</html>

