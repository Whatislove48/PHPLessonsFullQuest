<?php

static $test = 0;

static $userList = ['Grisha'=>'Aboba',
    'Petya'=>'Bebra',
    'Danil'=>'Biba',
];                // начальная база пользователей


function getUsersList()                  // вернет массив всех пользователей
{
    return $GLOBALS['userList'];
}

function existsUser(string $login) // вернет есть ли пользователь с данным именем
{
    $list = getUsersList();
    foreach ($list as $name){
        if ($name == $login) { return true; }
    }
    return false;
}

function checkPassword(string $login,string $password)// проверяет логин и пароль возвращает bool
{
    $list = getUsersList();
    foreach ($list as $name => $pass){
        if ($name == $login && $password == $pass) { return true; }
    }
    return false;
}


function saveUser(array $newList) // добавит новые данные пользователя в базу
{
    $GLOBALS['userList'] = $newList;
    $GLOBALS['test']+=1;
}

function getTest()
{
    return $GLOBALS['test'];
}