<?php

/** @var App\View\Views $this */

echo $this->getData()['articles']->getAll();
$id = $this->getData()['articles']->getId();
$author = $this->getData()['articles']->getAuthor();
$title = $this->getData()['articles']->getTitle();
$text = $this->getData()['articles']->getText();

?>

<form action="index.php?ctrl=AdminWebFirst&&act=changeArticle" method="post">
    <input type="text" name="author" value="<?= $author ?>"> Author <br>
    <input type="text" name="title" value="<?= $title ?>"> Title <br>
    <input type="text" name="text" value="<?= $text ?>"> Text <br>
    <input type="hidden" name="id" value="<?= $id ?>">
    <button type="submit"> Редактировать</button>
</form>
