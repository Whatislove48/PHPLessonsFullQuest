<?php

namespace App\Repositories;


use App\Exceptions\DbException;
use App\Exceptions\NotFoundExpection;

abstract class MainRepository
{

    public const TABLE = '';


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
            throw new DbException($sql, 'ERROR QUERY');
        }
        $res = $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        if (empty($res)) {
            throw new NotFoundExpection('404 - Запись не найдена');
        }
        return $res;
    }

    /**
     * updating in database exist field
     */
    private function update(): void // W
    {

        $fields = get_object_vars($this);
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
     */
    private function paste(): void  // W
    {

        $fields = get_object_vars($this);
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
     * @return string
     */
    public function save(): bool
    {
        $fields = get_object_vars($this);

        if (array_key_exists('id', $fields)) {
            $this->update();
            return false;
        }
        $this->paste();
        return true;
    }


    /**
     * delete field for given id
     * @return bool
     */
    public function delete(): bool // W
    {
        $data = [];
        $fields = get_object_vars($this);

        if (!array_key_exists('id', $fields)) {
            return false;
        }
        $data[':id'] = $fields['id'];

        $sql = 'DELETE FROM ' . static::TABLE .
            ' WHERE id=:id';

        $this->insert($sql, $data);
        return true;
    }








}