<?php


//var_dump($_FILES['picture01']['name']);
//var_dump($_FILES);

$type = $_FILES['picture01']['type'];
$error = $_FILES['picture01']['error'];
$name = $_FILES['picture01']['name'];

//var_dump($type);
//die;

if (isset($_FILES['picture01'])){
    if (0 == $error){
        if ('image/jpeg'=== $type) {
            move_uploaded_file($_FILES['picture01']['tmp_name'],
                __DIR__ . '/pictures/' . $name);
        }
        else{
            echo 'Неверный тип ';
        }
    }
    else {
        echo 'Error';
    }
}
?>

<a href="PhotoGallery.php">На главную</a>


