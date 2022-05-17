<?php

require_once __DIR__.'/classes/GuestBook.php';
require_once __DIR__.'/classes/GuestBookRecord.php';

$guestBook = new GuestBook();


if ('' === trim($_POST['record'])) {
    echo 'Запись не введена';
    header("Location: firstTest.php");
    exit;
}
else{
    $record = new GuestBookRecord(trim($_POST['record']));
    $guestBook->append($record);
    $guestBook->saveRecord();
}

?>

<html lang="ru">
<a href="firstTest.php">На главную</a>
</html>
