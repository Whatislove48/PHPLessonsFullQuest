<?php

namespace App;


use App\Exceptions\DbException;
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
        if (false === $sth->execute($data)) {
            throw new DbException('ERROR INSERT');
        }
        return true;
    }


    public function query(string $sql, string $class, $data = []): array //W
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($data);

        if (false === $res) {
            throw new DbException('ERROR QUERY');
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }


}