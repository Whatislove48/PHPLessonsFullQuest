<?php

session_start();


//$pathBase = __DIR__. 'userBase.txt';

//--------------------------------------------------------
//                               COMPLETE

function getUsersList()                  // вернет массив строк пользователей
{
    $pathBase = __DIR__. '/userBase.txt';
    return file($pathBase,FILE_IGNORE_NEW_LINES);
}


function existsUser(string $login) // вернет есть ли пользователь с данным именем
{
    $pathBase = __DIR__. '/userBase.txt';
    $list = getUsersList();
    $trimLine =[];
    foreach ($list as $line){      // обрезает пробелы в начале и конце строк массива
        $trimLine = trim($line);
    }
    $normalList = [];
    $normalList = explode(' ',$list);
    foreach ($trimLine as $lines) {

    }
    return false;

}

//========================================================================================
//                               COMPLETE

function getUserInfo(){// возвращает двумерный массив [колличество строк count] [пара -> логин пароль]

    $list = getUsersList();
    $trimLine =[];
    foreach ($list as $line){      // обрезает пробелы в начале и конце строк массива
        $trimLine[] = trim($line);
    }
    $len = count($trimLine);
    $normalList = [];
    foreach ($trimLine as $lines) {
        $normalList[] = explode(' ',$lines);
    }
    return $normalList;
}

//====================================================================================
//                               COMPLETE

function checkPassword(string $login, string $password)// проверяет логин и пароль возвращает bool
{
    $len = count(getUsersList());
    $normalList = getUserInfo();
    // $normalList[] это двумерный массив в [колличество строк count] [пара -> логин пароль]
    for ($i = 0;$i<$len;$i++){
        for ($j = 0;$j<2;$j++){
            if ($normalList[$i][0] == $login &&
                $normalList[$i][1] == $password ){
                return true;
            }
        }
    }
    return false;
}

//________________________________________________________________________________________________

function saveUser(string $log, string $pass) // добавит новые данные пользователя в базу
{
    $fh = fopen($path, 'w+');
    foreach ($userInfo as $lineRec) {
        fwrite($rec, $lineRec);
    }
    fclose($rec);
}



function getCurrentUser()                                  // вернет имя или же нулл
{
    if (isset($_COOKIE['username']) && isset($_COOKIE['secret'])) {
        $login = $_COOKIE['username'];
        $password = $_COOKIE['secret'];
        $list = getUsersList();
        foreach ($list as $name => $pass) {
            if ($name == $login && $password == ($pass)) {
                return $login;
            }
        }
    }
    return false;
}

//---------------------------------------------------------------------------------------
//                               COMPLETE
//
function setUserCookie(string $login, string $password) // установит кук юзеру при успешной авторизации
{
    setcookie('username', $login);
    setcookie('secret', sha1($password));
}

//---------------------------------------------------------------------------------------
//                               COMPLETE

function saveLog(string $path, array $userInfo)
{  // сохраняет лог запросов
    $rec = fopen($path, 'w+');
    foreach ($userInfo as $lineRec) {
        fwrite($rec, $lineRec);
    }
    fclose($rec);
}

//-----------------------------------------------------------------------


