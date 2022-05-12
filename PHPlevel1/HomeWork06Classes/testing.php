<?php

require_once __DIR__ . '/classes/Table.php';
require_once __DIR__ . '/classes/Cabinet.php';

?>


<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Classes</title>
</head>
<body>

<h1>Welcome</h1>

<?php

$table1 = new Table(2499,'Yellow');
$table1->color = 'Yellow';
$table1->legs = '6';
$table1->price = '2499';
echo $table1->show();

echo '<br>';

$cab1 = new Cabinet(5999,'Blue');
$cab1->price = 5999;
$cab1->doors = 5;
$cab1->color = 'Blue';

echo $cab1->show();



?>


</body>
</html>
