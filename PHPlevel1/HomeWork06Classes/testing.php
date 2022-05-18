<?php
require_once __DIR__ . '/classes/GuestBook.php';
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Classes</title>
</head>
<body>

<h1>Testing.php</h1>

<form action="" method="post">
    <input type="text" name="record" placeholder="Введите запись">
    <button type="submit">Внести запись</button>
</form>
<br>

<?php

$path = __DIR__ . '/GuestBook.txt';


$book = new GuestBook($path);

foreach ($book->getData() as $line) {
    echo $line . '<br>';
}

if (trim($_POST['record']) !== '') {

    $newRecord = $_POST['record'];
    $book->append($newRecord);
    $book->saveData();
    header('Location: testing.php');
}

?>

</body>
</html>
