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
    <a href="/index.php/AdminWebThird/showAllArticle"> Admin </a>
</h3>

<?php
foreach ($this->articles as $key => $new) {?>
    <form action= "/public/index.php/ClientWebThird/showArticle/<?= $new->getId() ?>" method="post">
        <button type="submit"> <?php  echo $new->getTitle(); ?> </button>
        <input type="hidden" name="ctrl" value="ClientWebThird">
        <input type="hidden" name="action" value="showArticle">
        <input type="hidden" name="id" value="<?= $new->getId() ?>"><hr>
    </form>
<?php }

if(!$this->confirm){
    ?>
    <br>  Вы не авторизованы <br>
<form action="/index.php/ClientWebThird/authorization" method="post">
    <input type="text" name='login' placeholder="Логин"><br>
    <input type="text" name='password' placeholder="Пароль"><br>
    <button type="submit"> Авторизация</button>
</form>

<?php } ?>

<hr>
</body>
</html>