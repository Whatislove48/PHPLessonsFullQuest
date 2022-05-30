<?php

namespace classes;

class Db
{


    protected $dbh;

    public function __construct()
    {

        $config = (include __DIR__ . '/../config.php')['db'];
        $this->dbh = new \PDO('mysql:host=' . $config['host'] .
            ';dbname=' . $config['dbname'],
            $config['user'], $config['password']);

    }

    public function getAll():array
    {
        $sql = 'SELECT * FROM news';
        $prepare = $this->dbh->prepare($sql);
        $prepare->execute();
        return $prepare->fetchAll();
    }


    public function query(string $sql,$data = []): bool
    {

        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll();
    }

}