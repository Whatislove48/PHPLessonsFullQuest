<?php

/** @var App\View\Views $this */


$id = $this->article->getId();
$author = $this->article->getAuthor();
$title = $this->article->getTitle();
$text = $this->article->getText();

echo 'Id -> '.$id.'<hr>'.
    'Author -> '.$author.'<hr>'.
    'Title -> '.$title.'<hr>'.
    'Text -> '.$text.'<hr>';

?>

<form action="/index.php/AdminWebThird/changeArticle/<?= $id ?>" method="post">
    <input type="text" name="author" value="<?= $author ?>"> Author <br>
    <input type="text" name="title" value="<?= $title ?>"> Title <br>
    <input type="text" name="text" value="<?= $text ?>"> Text <br>
    <input type="hidden" name="id" value="<?= $id ?>">
    <button type="submit"> Редактировать</button>
</form>
