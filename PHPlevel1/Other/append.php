<?php



$biba = 25;
$boba = 13;

try {
    if($boba !== 12){
        throw new Exception('Boba is dont 12');
    }
}
catch (Exception $ex){
    echo 'Boba ne raven 12';
} finally {
    echo 'End';
}


?>

<html lang="ru">
<a href="firstTest.php">На главную</a>
</html>
