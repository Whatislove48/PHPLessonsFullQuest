<!doctype html>
<html lang="re">
<body>
<h2>  Привет  <?= $this->getData()['cook']->getCurrentUser
    ($this->getData()['log']
    ,$this->getData()['pass'])
    ?></h2>

<?php

foreach ($this->getData()['articles'] as $key => $new) {?>
    <article >
        <a href="article.php?id=<?php echo $new->getId()?>"><br>
            <?php  echo $new->getTitle(); ?></a>
    </article>
    <?php
    if ($this->getData()['admin']) { ?><br><table>
        <td><a href="changeArticle.php?id=<?= $new->getId()?>"> Редактировать новость</a></td>
        <td><a href="deleteArticle.php?id=<?= $new->getId()?>"> Удалить новость</a></td>
    <?php } ?>
    </table><hr>

<?php }

if (!$this->getData()['confirm']) {
    ?>
    <hr> Авторизация <br>
    <form action="login.php" method="post">
        <input type="text" name='user' placeholder="Логин" required minlength="3"><br>
        <input type="text" name='pass' placeholder="Пароль" required minlength="3"><br>
        <button type="submit"> Авторизация</button>
    </form>

    Не зарегистрированы? Тогда вам <br>
    <a href="login.php"> На страницу регистрации</a><br>

<?php }

if ($this->getData()['admin']){ ?>
    Добавление Новости <br>
    <form action="addArticle.php" method="post">
        <input type="text" name="author"> Author <br>
        <input type="text" name="title"> Title <br>
        <input type="text" name="text"> Text <br>
        <button type="submit"> Add </button>
    </form>
<?php } ?>

<form action="index.php" method="post">
    <input type="hidden" name="out" value="1">
    <button type="submit"> Выйти</button>
</form>

</body>
</html>

