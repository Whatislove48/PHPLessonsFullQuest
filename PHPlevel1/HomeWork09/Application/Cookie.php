<?php

namespace Application;

use Application\Db;


class Cookie
{

    // public function getUsersList()   вернет массив строк пользователей
   // protected $user;
    protected string $table = 'users';


    public function checkPassword(string $login, string $password):bool //WORK!!
    {
        $db = new Db();
        $data = [':login' => $login,
            ':password' => $password];

        $sql = 'SELECT * FROM ' . $this->table . ' WHERE login =:login and 
        password =:password';
        $test = $db->query($sql, Cookie::class, $data);

        if (!empty($test)) {
            return true;
        }
        return false;
    }


    public function getCurrentUser(): string   //  WORK!!!
    {
        if (isset($_COOKIE['user']) && isset($_COOKIE['pass'])) {
            $data[':login'] = $_COOKIE['user'];
            $db = new Db();
            $sql = 'SELECT login FROM ' . $this->table . ' WHERE login =:login';
            $res = $db->query($sql, Cookie::class, $data);
            return $res[0]['login'];
        }
        return 'Unknown user';
    }


    public function existsUser(string $login): bool // WORK!!!
    {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE login =:login';
        $data = [':login' => $login];
        $db = new Db();
        if (empty($db->query($sql, Cookie::class, $data))) {
            return false;
        }
        return true;
    }

    public function setCookie(string $log,string $pass):void // WORK
    {
        setcookie('user', $log);
        setcookie('pass', ($pass));
    }


}