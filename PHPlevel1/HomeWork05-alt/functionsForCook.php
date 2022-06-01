<?php

session_start();


//$pathBase = __DIR__. '/userBase.txt';

//--------------------------------------------------------
//                               COMPLETE

function getUsersList()                  // вернет массив строк пользователей
{
    $pathBase = __DIR__ . '/userBase.txt';
    return file($pathBase, FILE_IGNORE_NEW_LINES);
}

//------------------------------------------------------------------------
//                               COMPLETE
function existsUser(string $login) // вернет есть ли пользователь с данным именем
{
    $len = count(getUsersList());
    $normalList = getUserInfo();
    //$login = $_COOKIE['username'];
    for ($i = 0; $i < $len; $i++) {
        if ($normalList[$i][0] == $login) {
            return true;
        }
    }
    return false;
}

//========================================================================================
//                               COMPLETE

function getUserInfo()
{// возвращает двумерный массив [колличество строк count] [пара -> логин пароль]

    $list = getUsersList();
    $trimLine = [];
    foreach ($list as $line) {      // обрезает пробелы в начале и конце строк массива
        $trimLine[] = trim($line);
    }

    $normalList = [];
    foreach ($trimLine as $lines) {
        $normalList[] = explode(' ', $lines);
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
    for ($i = 0; $i < $len; $i++) {
        if ($normalList[$i][0] == $login &&
            $normalList[$i][1] == $password) {
            return true;
        }
    }
    return false;
}

//________________________________________________________________________________________

//-----------------------------------------------------------------------------
//                               COMPLETE
//
function getCurrentUser()                                  // вернет имя или же нулл
{
    if (isset($_COOKIE['username']) && isset($_COOKIE['secret'])) {
        $len = count(getUsersList());
        $normalList = getUserInfo();
        $login = $_COOKIE['username'];
        $password = $_COOKIE['secret'];
        for ($i = 0; $i < $len; $i++) {
            if ($normalList[$i][0] == $login &&
                $normalList[$i][1] == $password) {
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
//                               COMPLETE
function saveUser(string $log, string $pass) // добавит новые данные пользователя в базу
{
    $pathBase = __DIR__ . '/userBase.txt';
    $userInfo = "\n" . $log . ' ' . sha1($pass);
    file_put_contents($pathBase, $userInfo, FILE_APPEND);
}

//-----------------------------------------------------------------------



