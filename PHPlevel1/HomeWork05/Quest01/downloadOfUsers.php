<?php


$type = $_FILES['picture01']['type'];
$error = $_FILES['picture01']['error'];
$name = $_FILES['picture01']['name'];



if (isset($_FILES['picture01'])){
    if (0 == $error){
        if ('image/jpeg'=== $type || 'image/png' === $type) {
            move_uploaded_file($_FILES['picture01']['tmp_name'],
                __DIR__ . '/image/' . $name);
        }
        else{
            echo 'Неверный тип ';
        }
    }
    else {
        echo 'Error';
    }
}
echo 'You Photo';
?>
<br>
<img src="image/<?php echo $name ?>" height="250" width="300">
<br>
<a href="myFirstSite.php">На главную</a>
