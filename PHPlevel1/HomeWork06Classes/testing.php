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
    <input type="text" name="record" placeholder="Введите запись" required>
    <button type="submit">Внести запись</button>
</form>
<br>

<?php

$path = __DIR__ . '/GuestBook.txt';

$book = new GuestBook($path);

foreach ($book->getData() as $line) {
    echo $line . '<br>';
}

if (isset($_POST['record']) && trim($_POST['record']) !== '') {

    $newRecord = trim($_POST['record']);
    $book->append($newRecord)->saveData();
    header('Location: testing.php');
}

?>

</body>
</html>
