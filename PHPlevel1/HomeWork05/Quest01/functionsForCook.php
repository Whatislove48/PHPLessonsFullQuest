<?php

static $test = 0;

static $userList = ['Grisha'=>'Aboba',
    'Petya'=>'Bebra',
    'Danil'=>'Biba',
];


function getUsersList()
{
    return $GLOBALS['userList'];
}

function existsUser(string $login)
{
    $list = getUsersList();
    foreach ($list as $name){
        if ($name == $login) { return true; }
    }
    return false;
}

function checkPassword(string $login,string $password)
{
    $list = getUsersList();
    foreach ($list as $name => $pass){
        if ($name == $login && $password == $pass) { return true; }
    }
    return false;
}

function getCurrentUser()
{

}

function saveUser(array $newList)
{
    $GLOBALS['userList'] = $newList;
    $GLOBALS['test']+=1;
}

function getTest()
{
    return $GLOBALS['test'];
}