<?php

namespace App;


use mysql_xdevapi\Exception;


class Db
{

    protected string $test;
    protected array $data = [];
    protected \PDO $dbh;

    public function __construct()
    {
        $config = new Config();
        $this->dbh = new \PDO($config->getHost() . $config->getDbName(),
            $config->getUser(), $config->getUserPass());
    }

    public function insert(string $sql, $data = []): bool  // W
    {
        $sth = $this->dbh->prepare($sql);
        if (true === $sth->execute($data)) {
            return true;
        }
        //throw new Exception('ERROR INSERT');
        return false;
    }


    public function query(string $sql, string $class, $data = []): array //W
    {
        $sth = $this->dbh->prepare($sql);
        if (false === $sth->execute($data)) {
            throw new Exception('ERROR QUERY');
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }


}