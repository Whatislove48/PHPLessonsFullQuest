<?php
/** @var App\View\Views $this */
?>

<!doctype html>
<html lang="re">
<body>

<h3>
    <a href="index.php?ctrl=ClientWebFirst&&act=showAllArticle"> Client </a>
</h3>


<h2>  Привет  <?= $this->getData()['cook']->getCurrentUser
    ($this->getData()['log']
    ,$this->getData()['pass'])
    ?></h2>

<?php

foreach ($this->getData()['articles'] as $key => $new) {?>
    <article >
       <br>
            <?php  echo $new->getTitle(); ?>
    </article>
    <br><table>
        <td><a href="index.php?ctrl=AdminWebFirst&&act=showArticle&&id=<?= $new->getId()?>"> Редактировать новость</a></td>
        <td><a href="index.php?ctrl=AdminWebFirst&&act=deleteArticle&&id=<?= $new->getId()?>"> Удалить новость</a></td>
    </table><hr>

<?php } ?>

<form action="index.php?ctrl=AdminWebFirst&&act=addArticle" method="post">
    <input type="text" name="author"> Author <br>
    <input type="text" name="title"> Title <br>
    <input type="text" name="text"> Text <br>
    <button type="submit"> Добавить новость</button>
</form>

</body>
</html>

