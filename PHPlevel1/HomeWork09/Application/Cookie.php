<?php

namespace Application;

use Application\Db;


class Cookie
{

    protected string $login;
    protected string $password;
    protected string $table = 'users';


    public function checkPassword(string $login, string $password): bool //W
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


    public function getCurrentUser(): string   //  W
    {
        if (isset($_COOKIE['user']) && isset($_COOKIE['pass'])) {
            $data[':login'] = $_COOKIE['user'];
            $db = new Db();
            $sql = 'SELECT login FROM ' . $this->table . ' WHERE login =:login';
            $res = $db->query($sql, Cookie::class, $data);
            if (empty($res)) {
                return 'Unknown user';
            }
            return $res[0]->login;
        }
        return 'Unknown user';
    }


    public function existsUser(string $login): bool // W
    {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE login =:login';
        $data = [':login' => $login];
        $db = new Db();
        if (empty($db->query($sql, Cookie::class, $data))) {
            return false;
        }
        return true;
    }

    public function setCookie(string $log, string $pass): void // W
    {
        setcookie('user', $log);
        setcookie('pass', ($pass));
    }

    public function saveUser(string $log, string $pass):void  //W
    {
        if ('' === $log || '' === $pass) {
            throw new \Exception('Empty field');
        }
        $sql = "INSERT INTO users (login,password) VALUES (
                                             :login,:pass)";
        $data = [':login' => $log,':pass' => $pass];
        $db = new Db();
        $db->insert($sql,$data);
    }


}