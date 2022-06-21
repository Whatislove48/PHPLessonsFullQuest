<?php

namespace App;

use mysql_xdevapi\Exception;

abstract class Model
{

    public const TABLE = '';


    /**
     * updating in database exist field
     * @return void
     * @throws Exceptions\DbException
     */
    protected function update(): void // W
    {
        $db = new Db();
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

        $db->insert($sql, $data);
    }


    /**
     * inserting in the database new field
     * @return void
     * @throws Exceptions\DbException
     */
    protected function insert(): void  // W
    {
        $db = new Db();
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

        $db->insert($sql, $data);
    }


    /**
     * find all fields in database
     * @return array
     * @throws Exceptions\DbException
     * @throws Exceptions\NotFoundExpection
     */
    public function findAll(): array
    {
        $sql = 'SELECT * FROM ' . static::TABLE;
        $db = new Db;
        return $db->query($sql, static::class);
    }


    /**
     * choose the way to save the field
     * @return string
     */
    public function save(): string // W
    {

        $fields = get_object_vars($this);

        if (array_key_exists('id', $fields)) {
            $this->update();
            return 'Update';
        }
        $this->insert();
        return 'Insert';
    }


    /**
     * delete field for given id
     * @return bool
     * @throws Exceptions\DbException
     */
    public function delete(): bool // W
    {
        $db = new Db;
        $data = [];

        $fields = get_object_vars($this);

        if (!array_key_exists('id', $fields)) {
            return false;
        }
        $data[':id'] = $fields['id'];

        $sql = 'DELETE FROM ' . static::TABLE .
            ' WHERE id=:id';

        $db->insert($sql, $data);
        return true;
    }


    /**
     * find info in database for given id
     * @param int $id
     * @return array
     * @throws Exceptions\DbException
     * @throws Exceptions\NotFoundExpection
     */
    public function findById(int $id): array // W
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE .
            ' WHERE id=:id';

        $data[':id'] = $id;
        return $db->query($sql, static::class, $data);
    }


}