<?php

require_once __DIR__.'/autoload.php';
spl_autoload_register('autoload');

var_dump($_POST);
$data = $_POST;

if (empty($_POST)){
    echo 'Абоба ты ничего не ввел';
    //header('location: http://localhost/PHPlevel2/HomeWork01/index.php');
}
else{
    $sql = "INSERT INTO news (author, title, text)
        VALUES ("."'".$data['author']."'".",
        "."'".$data['title']."'".",
        "."'".$data['text']."'".")";

    $db = new \App\Db();
    if(true === $db->execute($sql)){
        echo 'Success';
    }


}


?>



<html lang="ru">
<a href="index.php">На главную</a>
</html>
