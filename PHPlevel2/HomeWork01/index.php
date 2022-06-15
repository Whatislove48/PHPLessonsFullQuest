<?php

require_once __DIR__.'/autoload.php';
spl_autoload_register('autoload');

$all = \App\Models\Article::findAllArticle(); // массив артикулов Object

$cook = new \App\Models\Cookie();
$cook->setCookie('Boss','a0a5c818517bbcc5303847645e27022c970dc73b');

$ctrl = 'AdminWebFirst';
$act = 'showAllArticle';

$class = $class = '\App\Controllers\\' . $ctrl;
$ctrl = new $class();
$ctrl->action($act);

?>

<!doctype html>
<html lang="ru">

<h1> Полный список новостей</h1>

<?php
foreach ($all as $key => $new) {?>
    <article style="border: 2px dotted #09ec2f; margin-bot">
        <a href="article.php?id=<?php echo $new->getId()?>"><br>
            <?php  echo $new->getTitle(); ?></a>
    </article>
    <br>
<?php } ?>

<form action="append.php" method="post">
    <input type="text" name="author"> Автор <br>
    <input type="text" name="title"> Заголовок <br>
    <input type="text" name="text"> Контент <br>
    <button type="submit">Записать новость</button>
</form>

<hr>
</html>







