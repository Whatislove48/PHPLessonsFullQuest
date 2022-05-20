<?php

require_once __DIR__ . '/Article.php';
require_once __DIR__ . '/News.php';
require_once __DIR__ . '/View.php';

class ConnectBase
{
    protected PDO $dbh;
    protected string $sql;// = 'SELECT * FROM persons';
    protected array $data;
    protected string $title;
    protected string $text;

    public function __construct() //получает обьект
    {
        $this->dbh = new PDO('mysql:host=localhost;dbname=testing',
            'root', '');
    }

    public function getTable(): array
    {
        $this->sql = 'SELECT * FROM news';
        $prepare = $this->dbh->prepare($this->sql);
        if (!($prepare->execute())) {
            throw new Exception('Чтение не удалось');
        }
        return $prepare->fetchAll(); // вернет массив 2мерный
    }

    public function execute(string $sql): bool
    {
        $this->sql = $sql;
        if (false === $this->dbh->prepare($this->sql)) {
            throw new Exception('Запрос не удался');
            //return false;
        }
        return true;
    }

    public function query(string $sql, array $data)
    {
        $this->sql = $sql;
        $prepare = $this->dbh->prepare($this->sql);
        $prepare->execute([':id'=>$data['id']]);
        return $prepare->fetchAll();
    }

}