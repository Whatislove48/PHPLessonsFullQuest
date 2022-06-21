<?php

namespace App\Repositories;

use App\Db;
use App\Exceptions\DbException;
use App\Exceptions\NotFoundExpection;
use App\Models\Cookie;

class CookieRepository extends MainRepository
{

    protected string $login;
    protected string $password;
    protected string $table = 'users';
    protected int $id;


    /**
     * @param string $login
     * @param string $password
     * @return bool
     */
    public function checkPassword(string $login, string $password): bool //W
    {
        $data = [':login' => $login,
            ':password' => $password];

        $sql = 'SELECT * FROM ' . $this->table . ' WHERE login =:login and 
        password =:password';
        $test = $this->query($sql, CookieRepository::class, $data);
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
        $sql = 'SELECT login FROM ' . $this->table . ' WHERE login =:login';
        $res = $this->query($sql, CookieRepository::class, $data);
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
        if (empty($this->query($sql, CookieRepository::class, $data))) {
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
        setcookie('log', $log, time() + 3600,'/');
        setcookie('pass', ($pass), time() + 3600,'/');
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
        $this->insert($sql, $data);
    }

//    public function checkAdmin(string $login, string $password): bool
//    {
//
//
//    }


}