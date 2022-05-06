<?php
require_once __DIR__.'/send.php';
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HW01 quest #1</title>
</head>
<body>
<h1>
    Caclulator
</h1>

<form method="post">
    First num:  <input type="number" name="first"><br>
    Second num: <input type="number" name="second"><br>
    Operation:  <input type="text" name="operator">
    <button type="submit"> = </button>

</form>


<?php


$fist = $_POST['first'] ?? false;
$second = $_POST['second'] ?? false;
$operation = $_POST['operator'] ?? false;


echo '<br>';
echo 'Out = '. showCalculate($fist,$second,$operation);

?>



</body>
</html>


