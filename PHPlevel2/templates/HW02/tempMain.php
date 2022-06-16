<?php
/** @var App\View\Views $this */
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>TEST</title>
</head>
<body>

<h1> Полный список новостей</h1>

<h3>
    <a href="index.php?ctrl=AdminWebSecond&&act=showAllArticle"> Admin </a>
</h3>

<?php
foreach ($this->data['articles'] as $key => $new) {?>
    <article>
        <a href="index.php?id=<?= $new->getId() ?>&&ctrl=ClientWebSecond&&act=showArticle"><hr>
            <?php  echo $new->getTitle(); ?></a>
    </article>
<?php } ?>



<hr>
</body>
</html>