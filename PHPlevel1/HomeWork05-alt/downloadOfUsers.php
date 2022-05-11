<?php

require_once __DIR__ . '/functionsForCook.php';

$path = __DIR__ . '/Userslog.txt';
$type = $_FILES['picture01']['type'];
$error = $_FILES['picture01']['error'];
$name = $_FILES['picture01']['name'];



if (isset($_FILES['picture01']) && $_FILES['picture01']['size'] !== 0) {
    if (0 == $error && existsUser($_COOKIE['username'])) {
        if ('image/jpeg' === $type || 'image/png' === $type) {
            move_uploaded_file($_FILES['picture01']['tmp_name'],
                __DIR__ . '/image/' . $name);
            $caseInfo = file($path);
            $caseInfo[] = date("Y-m-d H:i:s") . "\n";
            $caseInfo[] = 'User name ' . getCurrentUser() . "\n";
            $caseInfo[] = 'Download ' . $_FILES['picture01']['name'] . "\n";
            saveLog($path, $caseInfo);
        } else {
            echo 'Неверный тип ';
        }
    } else {
        echo 'Error';
    }
}
echo 'You Photo';
?>
<br>
<img src="image/<?php echo $name ?>" height="250" width="300">
<br>
<a href="myFirstSite.php">На главную</a>
