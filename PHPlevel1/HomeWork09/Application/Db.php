<?php

namespace Application;

use \Application\Cookie;
use \Application\Trains;


class Db
{

    protected array $data = [];


    public function __construct()
    {
        $config = include __DIR__ . '/../config.php';
        $dbh = new \PDO('mysql:host=' . $config['host'] .
            ';dbname=' . $config['dbname'],
            $config['user'], $config['password']);
    }

    public function insert(string $table):bool
    {

        return true;
    }



}