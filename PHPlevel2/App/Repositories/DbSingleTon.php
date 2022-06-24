<?php

namespace App\Repositories;

use App\Config;
use App\Exceptions\DbException;

abstract class DbSingleTon
{

    private static \PDO|null $instance = null;


    private function __construct()
    {
    }


    private function __clone(): void
    {
    }


    public static function connect(): \PDO
    {
        try {
            if (null === self::$instance) {
                $config = new Config();
                self::$instance = new \PDO($config->getHost() . $config->getDbName(),
                    $config->getUser(), $config->getUserPass());
            }
        } catch (\PDOException $e) {
            throw new DbException('', 'Ошибка подключения к базе');
        }
        return self::$instance;
    }


}