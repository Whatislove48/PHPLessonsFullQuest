<?php

require_once __DIR__ . '/autoload.php';
spl_autoload_register('autoload');

$gallary = new \Application\Gallary();

$allImage = $gallary->getAllPhotoName();

foreach ($allImage as $image) {
    ?>
    <img src="image/<?= $image ?>" height="250" width="300" alt="City">

<?php }?>


<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <button type="submit"> Загрузить новое фото </button>
</form>

<?php

try {
    if(!empty($_FILES)){
        $gallary->addImage($_FILES['image']);
    }
}
catch (Exception $ex){
    echo $ex->getMessage();
}


?>

<a href="index.php"> На главную </a>

