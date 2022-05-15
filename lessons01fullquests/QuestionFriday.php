<?php


require_once __DIR__ . '/function.php';


?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no,
          initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Friday</title>
</head>
<body>
<h1>
    String conf
</h1>
<?php


//$textEn = 'Hello World!';
$textEn = 'Everybody dance now!';
//$textRu = 'Делу время потехе час';
//$textRu = 'Саша любит арбузы';
$textRu = 'Гидроэлектроизолятор';

$longWords = [];

var_dump($longWords);
echo '<br>';
var_dump(count($longWords));
if (count($longWords) === 0) {
    echo 'ABOBA';
}

die;

for ($i = 0; $i < 10; $i++) {
    if (0 === $i % 2) {
        $test[$i] = true;
    } else {
        $test[$i] = false;
    }
}

var_dump($test);


die;

echo replaceBigRusWords($textRu);


?>

</body>
</html>