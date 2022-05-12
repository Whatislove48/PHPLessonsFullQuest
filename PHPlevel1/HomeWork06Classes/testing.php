<?php

require_once __DIR__ . '/classes/GuestBook.php';

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0,
           maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Classes</title>
</head>
<body>

<h1>Testing.php</h1>

<?php

$path = __DIR__.'/GuestBook.txt';

$test = 'My Next Record';

$book  = new GuestBook($path);

var_dump($book->getData());

foreach ($book->getData() as $line){
    echo $line . '<br>';
}

$book->append($test);
if (isset($test) && trim($test) !== '') {
    $book->saveData();
}

echo '--------------- <br>';

var_dump($book->getData());


?>


</body>
</html>
