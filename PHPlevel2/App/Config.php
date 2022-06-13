<?php

namespace App;

class Config
{

    protected string $host;
    protected string $dbname;
    protected string $user;
    protected string $password;


    public function __construct()
    {
        $config = include __DIR__ . '/../config.php';
        $this->host = $config['db']['host'];
        $this->dbname = $config['db']['dbname'];
        $this->user = $config['db']['user'];
        $this->password = $config['db']['password'];
    }

    public function getHost(): string
    {
        return 'mysql:host=' . $this->host;
    }

    public function getDbName(): string
    {
        return ';dbname=' . $this->dbname;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function getUserPass(): string
    {
        return $this->password;
    }

}