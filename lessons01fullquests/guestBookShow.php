<?php

require_once __DIR__ . '/functionBook.php';

?>


<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ShowBook</title>
</head>
<body>
<h1>
    Guest Book config
</h1>

<?php

$path = __DIR__ . '/GuestBook01.txt';

$lines = getGuestBook($path);     // возвращает массив записей


foreach ($lines as $line){                    // отображает записи
    ?><td>- <?php echo $line. '<br>';?></td>
    <?php
    }
    ?>
<form method="post">
    Введите новую запись: <input type="text" name="record">
    <button type="submit">Внести запись</button>
    <?php
    echo 'Grisha';
    echo '<br>';
    //$lines[] = $_POST['record']."\n";
    //foreach ($lines as $str){
    //    echo $str. '<br>';
   // }

    ?>
</form>

<?php
//var_dump($_POST['record']);
//var_dump(isset($_POST['record']));

if(isset($_POST['record'])) {
    $recLine = $_POST['record'];
    if ('' !== $recLine) {
        $lines[] = $recLine . "\n";
        echo 'Запись внесена' . '<br>';
        addRecordGuestBook($path, $lines);
    }
    else echo 'Вы ничего не ввели!';
}
else {
    $recLine = 'Not found!';
    echo 'ERROR - value not found!';
}


?>
<br>
<a href="lection04quest01.php">Вернуться на главную</a>


</body>
</html>