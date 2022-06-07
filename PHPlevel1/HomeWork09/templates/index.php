<!doctype html>
<html lang="re">

<body>
<h1> Краснодар приветсвует Вас </h1>

<h4>Добрый день <?= $this->getData()['cook']->getCurrentUser() ?><br>
    На данном сайте тебе предоставлены фотокарточки города
    и записи электричек чтобы поскорее уже свалить отсюда
</h4><br>

<?php

foreach ($this->getData()['images'] as $image) { ?>
    <img src="image/<?= $image ?>" height="200" width="200" alt="City">
<?php }

foreach ($this->getData()['trains'] as $trains) {
    echo '<hr>';
    echo $trains->getRoute();
}

if ($this->getData()['admin']) { ?><br>
    <a href="gallary.php"> Редактировать галерею</a><br>
    <a href="trains.php"> Редактировать расписание</a>
<?php } ?>

<?php

if (!$this->getData()['access']) {
    ?>
    <hr> Авторизация <br>
    <form action="login.php" method="post">
        <input type="text" name='user' placeholder="Логин" required minlength="3"><br>
        <input type="text" name='pass' placeholder="Пароль" required minlength="3"><br>
        <button type="submit"> Авторизация</button>
    </form>

    Не зарегистрированы? Тогда вам <br>
    <a href="login.php"> На страницу регистрации</a><br>

<?php } ?>

<form action="index.php" method="post">
    <input type="hidden" name="out" value="1">
    <button type="submit"> Выйти</button>
</form>

</body>
</html>