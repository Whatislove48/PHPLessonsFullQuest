<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Шаблон</title>
</head>
<body>

<h1>Шаблон №1</h1>

<?php
foreach ($guestBook->getRecords() as $record) {
    ?>
    <article style="border: 2px dotted #199ab4; margin-bottom: 20px">
        <?php echo $record->getMessage(); ?>
    </article>
<?php } ?>

<hr>
<form action="append.php" method="post">
    <textarea name="record"></textarea>
    <button type="submit">Записать в книгу</button>
</form>

<?php

?>


</body>
</html>