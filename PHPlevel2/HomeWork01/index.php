<?php

require_once __DIR__.'/autoload.php';
spl_autoload_register('autoload');

$art = new \App\Models\Article();
$all = $art->findAll(); // массив артикулов Object


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







