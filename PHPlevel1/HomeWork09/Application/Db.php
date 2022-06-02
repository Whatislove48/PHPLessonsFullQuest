<?php

namespace Application;

use \Application\Cookie;
use \Application\Trains;
use mysql_xdevapi\Exception;


class Db
{

    protected array $data = [];
    protected \PDO $dbh;

    public function __construct()
    {
        $config = include __DIR__ . '/../config.php';
        $this->dbh = new \PDO('mysql:host=' . $config['host'] .
            ';dbname=' . $config['dbname'],
            $config['user'], $config['password']);
    }

    public function insert(string $sql, $data = []): bool  // WORK!
    {
        $sth = $this->dbh->prepare($sql);
        if (true === $sth->execute($data)) {
            return true;
        }
        //throw new Exception('ERROR INSERT');
        return false;
    }


    public function query(string $sql, string $class, $data = []): array
    {
        $sth = $this->dbh->prepare($sql);
        if (false === $sth->execute($data)) {
            throw new Exception('ERROR QUERY');
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS,$class);
        //return $sth->fetchAll();
    }


}