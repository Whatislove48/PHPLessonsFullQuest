<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title> Полная новость</title>
</head>
<body>

<h1> Новость <?php echo $this->getData()[0]->getId(); ?></h1>

<?php
$new = $this->getData()[0];
echo '<br>Author: ';
echo $new->getAuthor();
echo '<br>Title: ';
echo $new->getTitle();
echo '<br>Text<br>';
echo $new->getText();

?>

</body>
</html>
