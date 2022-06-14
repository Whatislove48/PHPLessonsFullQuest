<?php

?>

<hr> Авторизация <br>
<form action="login.php" method="post">
    <input type="text" name='user' placeholder="Логин" required minlength="3"><br>
    <input type="text" name='pass' placeholder="Пароль" required minlength="3"><br>
    <button type="submit"> Авторизация</button>
</form>

Не зарегистрированы? Тогда вам <br>
<a href="login.php"> На страницу регистрации</a><br>

<form action="index.php" method="post">
    <input type="hidden" name="out" value="1">
    <button type="submit"> Выйти</button>
</form>
