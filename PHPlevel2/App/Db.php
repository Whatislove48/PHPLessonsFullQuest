<?php

namespace App;


use App\Exceptions\DbException;
use App\Repositories\DbSingleTon;
use App\Exceptions\NotFoundExpection;
use mysql_xdevapi\Exception;


class Db
{

    protected string $test;
    protected array $data = [];
    protected \PDO $dbh;


    /**
     * @throws DbException
     */
//    public function __construct()
//    {
//        try{
//            $config = new Config();
//            $this->dbh = new \PDO($config->getHost() . $config->getDbName(),
//                $config->getUser(), $config->getUserPass());
//        }
//        catch (\PDOException $er){
//            throw new DbException('','Ошибка подключения к базе');
//        }
//    }

    public function __construct()
    {
        $this->dbh = DbSingleTon::connect();
    }


    /**
     * @param string $sql
     * @param array $data
     * @return bool
     * @throws DbException
     */
    public function insert(string $sql, array $data = []): bool  // W
    {
        $sth = $this->dbh->prepare($sql);
        if (false === $sth->execute($data)) {
            throw new DbException($sql, 'ERROR INSERT');
        }
        return true;
    }


    /**
     * @param string $sql
     * @param string $class
     * @param array $data
     * @return array
     * @throws DbException
     * @throws NotFoundExpection
     */
    public function query(string $sql, string $class, array $data = []): array //W
    {
        try {
            $sth = $this->dbh->prepare($sql);
            $sth->execute($data);
        } catch (\PDOException $pdo) {
            throw new DbException($sql, 'ERROR QUERY');
        }
        $res = $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        //if(empty($res) ){
        //throw new NotFoundExpection('404 - Запись не найдена');
        //}
        return $res;
    }


}