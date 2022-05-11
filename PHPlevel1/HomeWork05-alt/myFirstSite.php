<?php
session_start();

require_once __DIR__ . '/functionsForCook.php';



$normalList = getUserInfo();
//var_dump($normalList);          // двумерный массив в [колличество строк count] [пара -> логин пароль]
$len = count(getUsersList());

echo '<br>';
for ($i = 0;$i<$len;$i++){
    for ($j = 0;$j<2;$j++){
        echo $normalList[$i][$j];
    }
    echo '<br>';
}


echo '--------------------' . '<br>';

die;

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Autorize</title>
</head>
<body>

<h1>Welcome</h1>

<?php

if (getCurrentUser()) {
    echo 'Добро пожаловать' . getCurrentUser();
    //
    ?>
    <form action="downloadOfUsers.php" method="post" enctype="multipart/form-data">
        <input type="file" name="picture01">
        <button type="submit">Отправить</button>
    </form>
    <br>
    <img src="image/osharashen.jpg">
    <?php
} else {
    ?>
    <form action="" method="post">
        <input type="text" name='user' placeholder="Логин" required minlength="3" maxlength="25"><br>
        <input type="text" name='password' placeholder="Пароль" required minlength="3" maxlength="20"><br>
        <button type="submit"> Авторизация</button>
    </form>

    Не зарегистрированы? Тогда вам <br>
    <a href="login.php"> На страницу регистрации</a><br>
    <?php

}

?>

<?php
$path = __DIR__ . '/Userslog.txt';


echo '<br>';

if (isset($_POST['password']) && isset($_POST['user'])) {
    $password = $_POST['password'];
    $name = $_POST['user'];
    //echo password_hash($password, PASSWORD_DEFAULT); // Хэширует пароль указанный в аргументе
    if (checkPassword($name, $password)) {
        setUserCookie($name, $password);
        header("Location: myFirstSite.php");
        exit;
    } else {
        echo 'Ты кто';
    }
}


echo '<br>';

?>

</body>
</html>