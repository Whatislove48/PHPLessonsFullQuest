<?php

require_once __DIR__.'/autoload.php';
spl_autoload_register('autoload');

$data = [':author'=> $_POST['author'],
        ':title'=> $_POST['title'],
        ':text'=> $_POST['text']];

if (empty($_POST)){
    echo 'Абоба ты ничего не ввел';
}
else{
    $sql = "INSERT INTO news (author, title, text)
        VALUES (:author,:title,:text)";

    $db = new \App\Db();
    if(true === $db->insert($sql,$data)){
        echo 'Success';
    }

}

?>

<html lang="ru">
<a href="index.php">На главную</a>
</html>
