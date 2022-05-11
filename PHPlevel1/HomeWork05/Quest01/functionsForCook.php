<?php

session_start();

static $userList = ['Grisha' => 'Aboba',
    'Petya' => 'Bebra',
    'Danil' => 'Biba',
];                // начальная база пользователей


if (!isset($_SESSION['array'])) {
    $_SESSION['array'] = $userList;
}


function getUsersList()                  // вернет массив всех пользователей
{
    return $_SESSION['array'];
}

function existsUser(string $login) // вернет есть ли пользователь с данным именем
{
    $list = getUsersList();
    foreach ($list as $name => $pass) {
        if ($name == $login) {
            return true;
        }
    }
    return false;
}

function checkPassword(string $login, string $password)// проверяет логин и пароль возвращает bool
{
    $list = getUsersList();
    foreach ($list as $name => $pass) {
        if ($name == $login && sha1($password) == $pass) {
            return true;
        }
    }
    return false;
}


function saveUser(string $log, string $pass) // добавит новые данные пользователя в базу
{
    $_SESSION['array'] += [$log => sha1($pass)];
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

function setUserCookie(string $login, string $password) // установит кук юзеру при успешной авторизации
{
    setcookie('username', $login);
    setcookie('secret', sha1($password));
}


function saveLog(string $path, array $userInfo)
{  // сохраняет лог запросов
    $rec = fopen($path, 'w+');
    foreach ($userInfo as $lineRec) {
        fwrite($rec, $lineRec);
    }
    fclose($rec);
}




