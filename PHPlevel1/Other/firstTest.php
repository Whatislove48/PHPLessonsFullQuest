<?php

require_once __DIR__.'/classes/User.php';
require_once __DIR__.'/functions.php';

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no,
          initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Другое</title>
</head>
<body>

<h1>Мусорник</h1>


<?php

$newUser = new User();
$newUser->email = '@Zeliboba.sru';

$text = 'Одножды ночью я спал.';
//sendMessage($newUser,$text);

foreach (getGuestBookRecords() as $line){?>
    <?php echo $line;?>
    <hr>
<?php }


?>

</body>
</html>
