<?php

namespace App\Models;

use App\Db;
use App\Exceptions\DbException;
use App\Exceptions\NotFoundExpection;

class Cookie
{

    protected string $login;
    protected string $password;
    protected string $table = 'users';


    /**
     * @param string $login
     * @param string $password
     * @return bool
     */
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


    /**
     * @param string $log
     * @param string $pass
     * @throws DbException
     * @throws NotFoundExpection
     * @return string
     */
    public function getCurrentUser(string $log, string $pass): string   //  W
    {
        $data[':login'] = $log;
        $db = new Db();
        $sql = 'SELECT login FROM ' . $this->table . ' WHERE login =:login';
        $res = $db->query($sql, Cookie::class, $data);
        if (empty($res)) {
            return 'Unknown user';
        }
        return $res[0]->login;

    }


    /**
     * @param string $login
     * @throws DbException
     * @throws NotFoundExpection
     * @return bool
     */
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

    /**
     * @param string $log
     * @param string $pass
     * @return void
     */
    public function setCookie(string $log, string $pass): void // W
    {
        setcookie('log', $log);
        setcookie('pass', ($pass));
    }

    /**
     * @param string $log
     * @param string $pass
     * @throws DbException
     * @return void
     */
    public function saveUser(string $log, string $pass): void  //W
    {
        if ('' === $log || '' === $pass) {
            throw new \Exception('Empty authorize field');
        }
        $sql = "INSERT INTO users (login,password) VALUES (
                                             :login,:pass)";
        $data = [':login' => $log, ':pass' => $pass];
        $db = new Db();
        $db->insert($sql, $data);
    }

//    public function checkAdmin(string $login, string $password): bool
//    {
//
//
//    }


}