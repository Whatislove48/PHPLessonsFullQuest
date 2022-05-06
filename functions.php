
<?php

$key = 0;

function showImages($key)
{
    if ($key == 10){
        ?>
        <img src="/images/MainGr.jpg" alt="ну типо земля " width="300" height="300">
        <?php
    }
    if ($key == 20){
        ?>
        <img src="/images/WaterImages.jpeg" alt="ну типо вода " width="300" height="300">
        <?php
    }
    if ($key == 30){
        ?>
        <img src="/images/FireImages.jpg" alt="ну типо огонь " width="300" height="300">
        <?php
    }
    if ($key == 40){
        ?>
        <img src="/images/WinterImages.jpg" alt="ну типо воздух " width="300" height="300">
        <?php
    }
}
return 'End of function';

?>



