<?php
/** @var App\View\Views $this */
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title> Полная новость</title>
</head>
<body>

<h1> Новость <?php echo $this->article->getId(); ?></h1>

<?php
$new = $this->article;
echo '<br>Author: ';
echo $new->getAuthor();
echo '<hr>Title: ';
echo $new->getTitle();
echo '<hr>Text:';
echo $new->getText();

?>
<hr>
<a href="index.php"> На главную </a>

</body>
</html>
