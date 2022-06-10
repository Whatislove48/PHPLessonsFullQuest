<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>TEST</title>
</head>
<body>

<h1> Полный список новостей</h1>

<?php
foreach ($this->data['articles'] as $key => $new) {?>
    <article>
        <a href="index.php?id=<?= $new->getId() ?>&&ctrl=ClientWebFour&&act=showArticle"><hr>
            <?php  echo $new->getTitle(); ?></a>
    </article>
<?php } ?>
<hr>
</body>
</html>