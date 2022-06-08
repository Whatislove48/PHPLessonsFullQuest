
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title> Полная новость</title>
</head>
<body>

<h3> Новость <?php echo $this->getData()[0]->getId(); ?></h3>

<?php

$new = $this->getData()[0];
echo '<br>';
echo $new->getAll();

?>

</body>
</html>
