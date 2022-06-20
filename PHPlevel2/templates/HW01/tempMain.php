<?php
/** @var App\View\Views $this */
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title> Articles </title>
</head>
<body>

<h1> Полный список новостей </h1>
<h3>
    <a href="index.php?ctrl=AdminWebFirst&&act=showAllArticle"> Admin </a>
</h3>

<?php
foreach ($this->articles as $key => $new) {?>
    <article>
        <a href="index.php?id=<?= $new->getId() ?>&&ctrl=ClientWebFirst&&act=showArticle"><hr>
            <?php  echo $new->getTitle(); ?></a>
    </article>
<?php }

if(!$this->confirm){
    ?>
    <br>  Вы не авторизованы <br>
<form action="index.php?ctrl=ClientWebFirst&&act=authorization" method="post">
    <input type="text" name='login' placeholder="Логин" required minlength="2"><br>
    <input type="text" name='password' placeholder="Пароль" required minlength="2"><br>
    <button type="submit"> Авторизация</button>
</form>

<?php } ?>

<hr>
</body>
</html>