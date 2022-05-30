<?php

require_once __DIR__ . '/Article.php';
require_once __DIR__ . '/News.php';
require_once __DIR__ . '/View.php';

class ConnectBase
{
    protected PDO $dbh;
    protected string $sql;
    protected array $data;
    protected string $title;
    protected string $text;

    public function __construct()
    {
        // тут проверка файла
        $config = file(__DIR__ . '/../config.txt', FILE_IGNORE_NEW_LINES);
        $this->dbh = new PDO($config[0],
            $config[1], $config[2]);
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
        if (false === $this->dbh->prepare($sql)) {
            //throw new Exception('Запрос не удался');
            return false;
        }
        return true;
    }

    public function query(string $sql, array $data): array|bool
    {
        if (false === $this->dbh->prepare($sql)) {
            return false;
        }
        $prepare = $this->dbh->prepare($sql);
        $prepare->execute([':id' => $data['id']]);
        return $prepare->fetchAll();
    }

}