<?php

namespace App\Repositories;


use App\Exceptions\DbException;
use App\Exceptions\NotFoundExpection;

abstract class MainRepository
{

    public const TABLE = '';
    public int $count = 0;


    /**
     * Connects with database and execute sql query
     */
    public function insert(string $sql, array $data = []): bool  // W
    {
        $db = DbSingleTon::connect();
        $sth = $db->prepare($sql);
        if (false === $sth->execute($data)) {
            throw new DbException($sql, 'ERROR INSERT');
        }
        return true;
    }

    /**
     * Connects with database and returns request data
     */
    public function query(string $sql, string $class, array $data = []): array //W
    {
        $db = DbSingleTon::connect();
        try {
            $sth = $db->prepare($sql);
            $sth->execute($data);
        } catch (\PDOException $pdo) {
            throw new DbException($sql, 'ERROR QUERY', 405);
        }
        $res = $sth->fetchAll(\PDO::FETCH_CLASS, $class);

        if ('App\Repositories\CookieRepository' === $class) {
            return $res;
        }
        if (empty($res)) {
            throw new NotFoundExpection('404 - Запись не найдена', 404);
        }
        return $res;
    }

    /**
     * updating in database exist field
     */
    private function update(object $object): void // W
    {

        $fields = get_object_vars($object);
        $data = [];
        $set = [];

        foreach ($fields as $name => $value) {
            if ('id' === $name) {
                $data[':id'] = $value;
                continue;
            }
            $data[':' . $name] = $value;
            $set[] = $name . '=' . ':' . $name;
        }

        $sql = 'UPDATE ' . static::TABLE . ' SET ' . implode(',', $set) .
            ' WHERE id=:id';

        $this->insert($sql, $data);
    }


    /**
     * inserting in the database new field
     * @throws DbException
     */
    private function paste(object $object): void  // W
    {

        $fields = get_object_vars($object);
        $data = [];
        $cols = [];

        foreach ($fields as $name => $value) {
            if ('id' === $name) {
                continue;
            }
            $cols[] = $name;
            $data[':' . $name] = $value;
        }

        $sql = "INSERT INTO " . static::TABLE . " ( " .
            implode(',', $cols) . ') 
            VALUES (' . implode(',', array_keys($data)) . ')';

        $this->insert($sql, $data);
    }


    /**
     * choose the way to save the field
     * @param object $object
     * @return bool
     * @throws DbException
     */
    public function save(object $object): bool
    {
        $fields = get_object_vars($object);

        if (array_key_exists('id', $fields)) {
            $this->update($object);
            return false;
        }
        $this->paste($object);
        return true;
    }


    /**
     * delete field for given id
     * @return bool
     * @throws DbException
     */
    public function delete(object $object): bool // W
    {
        $data = [];
        $fields = get_object_vars($object);

        if (!array_key_exists('id', $fields)) {
            return false;
        }
        $data[':id'] = $fields['id'];

        $sql = 'DELETE FROM ' . static::TABLE .
            ' WHERE id=:id';

        $this->insert($sql, $data);
        return true;
    }


    public function findAll(): array
    {
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $this->query($sql, static::CLASSNAME);
    }


    public function queryEach(string $sql, string $class, array $data = [])
    {
        $db = DbSingleTon::connect();

        $sth = $db->prepare($sql);
        $sth->execute($data);

        $res = $sth->fetch(\PDO::FETCH_CLASS, $class);
        while (isset($res)) {
            $res = $sth->fetch(\PDO::FETCH_CLASS, $class);
            yield $res;
        }
    }


}