<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>ДЗ</title>
</head>
<body>

<h1> Test One</h1>

<?php

?>

<?php
foreach ($this->getRecords() as $record) {?>
<article style="border: 2px dotted #199ab4; margin-bottom: 20px">
<?php  echo $record;?>
</article>
<?php }


?>


<hr>
<form action="append.php" method="post">
    <textarea name="record"></textarea>
    <button type="submit">Записать в книгу</button>
</form>


</body>
</html>