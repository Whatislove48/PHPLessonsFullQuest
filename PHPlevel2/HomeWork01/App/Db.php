<?php

namespace App;

use App\Models\Article;

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

    public function getAll(): array
    {
        $sql = 'SELECT * FROM news';
        $prepare = $this->dbh->prepare($sql);
        $prepare->execute();
        return $prepare->fetchAll();
    }


    public function query(string $sql, $data = []): array
    {

        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        $data = $sth->fetchAll();
        $res = [];
        foreach ($data as $row) {
            $res[] = new \classes\Models\Article($row['id'],
                                                 $row['author'],
                                                 $row['title'],
                                                 $row['text']);

        }
        return $res;
    }


    public function upQuery(string $sql, $class, $data = []): array
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll(\PDO::FETCH_CLASS,$class);
    }

    public function execute($sql,$params =[]){

        $sth = $this->dbh->prepare($sql);
        if( false === $sth->execute($params)){
            return false;
        }
        return true;
    }

}