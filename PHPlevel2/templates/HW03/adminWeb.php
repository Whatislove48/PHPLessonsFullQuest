<?php
/** @var App\View\Views $this */
?>

<!doctype html>
<html lang="ru">
<body>

<h3>
    <a href="/index.php/ClientWebThird/showAllArticle"> Client </a>
</h3>

<h2>  Привет  <?= $this->user; ?></h2>

<?php

foreach ($this->articles as $key => $new) {?>
    <article >
       <br>
            <?php  echo $new->getTitle(); ?>
    </article>
    <form action="/index.php/AdminWebThird/showArticle/<?= $new->getId()?>" method="post">
        <input type="hidden" name="changeId" value="<?= $new->getId()?>">
        <button type="submit"> Редактировать </button>
    </form>
    <form action="/index.php/AdminWebThird/deleteArticle/<?= $new->getId()?>" method="post">
        <input type="hidden" name="delId" value="<?= $new->getId()?>">
        <button type="submit"> Удалить </button>
    </form><hr>

<?php } ?>

<form action="/index.php/AdminWebThird/addArticle" method="post">
    <input type="text" name="author"> Author <br>
    <input type="text" name="title"> Title <br>
    <input type="text" name="text"> Text <br>
    <button type="submit"> Добавить новость</button>
</form>

</body>
</html>

