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
foreach ($this->data as $key => $new) {?>
<article style="border: 2px dotted #199ab4; margin-bot">
<a href="templates/append.php?id=<?php echo $key?>"><br>
    <?php  echo $new->getTitle(); ?></a>
</article>
<?php }


?>


<hr>


</body>
</html>