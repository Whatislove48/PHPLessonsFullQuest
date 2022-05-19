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

try {
    $book = new GuestBook($path);
} catch (Exception $ex) {
    echo $ex->getMessage();
}

foreach ($book->getData() as $line) {
    echo $line . '<br>';
}

if (trim($_POST['record']) !== '') {
    $newRecord = $_POST['record'];
    if ($book->append($newRecord)) {
        $book->saveData();
        header('Location: testing.php');
    }
}
?>

</body>
</html>
