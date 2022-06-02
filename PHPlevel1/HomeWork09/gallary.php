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

if(!empty($_FILES)){
    $gallary->addImage($_FILES['image']);
}


?>

