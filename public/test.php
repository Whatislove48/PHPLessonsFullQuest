<?php


require_once __DIR__ . '/../PHPlevel2/App/autoload.php';

echo 'Hello';
echo '<br>';


$yii = dirname(__FILE__) .'/../vendor/yiisoft/yii/framework/yii.php' ;
$config = dirname(__FILE__) .'/../vendor/yiisoft/yii/framework/yii.php' ;

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once $yii;


Yii::createWebApplication($config)->run();



// /home/roman/PhpstormProjects/localhost/PHPLessonsFullQuest/testdrive/../vendor/yiisoft/yii/framework/yii.php"
// /home/roman/PhpstormProjects/localhost/PHPLessonsFullQuest/public/../vendor/yiisoft/yii/framework/yii.php










