<?php
/** @var App\View\Views $this */


?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title> Ошибка </title>
</head>
<body>

<h1> Ошибка <?= $this->error->getCode(); ?></h1>

<?php
echo '<br>Messege: ';
echo $this->error->getMessage();
echo '<hr>Line: ';
echo $this->error->getLine();
echo '<hr>Code:';
echo $this->error->getCode();
echo '<hr>File:';
echo $this->error->getFile();


if(isset($_POST['out'])){
    header('Location: http://localhost/index.php');
}

?>
<hr>
<form  action="" method="post">
    <button type="submit" name="out"> На главную </button>
</form>

</body>
</html>
