<?php
session_start();

$users = require_once __DIR__ . '/functionsForCook.php';


var_dump($_COOKIE);
$_SESSION['mycount'] = 30;
var_dump($_SESSION);

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

if (getCurrentUser()){
    echo 'Добро пожаловать'. getCurrentUser() ;
    ?>
    <br>
    <img src="image/osharashen.jpg">
<?php
}
else {
    ?>
    <form action="" method="post">
        <input type="text" name = 'user' placeholder="Логин" required><br>
        <input type="text" name = 'password' placeholder="Пароль" required><br>
        <button type="submit"> Авторизация </button>
    </form>

Не зарегистрированы? Тогда вам <br>
<a href="login.php"> На страницу регистрации</a><br>
<?php

}

?>


<?php

echo '<br>';

if (isset($_POST['password']) && isset($_POST['user'])) {
    $password = $_POST['password'];
    $name = $_POST['user'];
    //echo password_hash($password, PASSWORD_DEFAULT); // Хэширует пароль указанный в аргументе
    if (checkPassword($name, $password)) {
        setUserCookie($name,$password);
        header("Location: myFirstSite.php");
        exit;
    } else {
        echo 'Ты кто';
    }


}


?>


</body>
</html>