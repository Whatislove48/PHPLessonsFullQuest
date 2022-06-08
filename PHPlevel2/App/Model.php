<?php

namespace App;

use mysql_xdevapi\Exception;

abstract class Model
{

    public const TABLE = '';


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


    public function findAll(): array
    {
        $sql = 'SELECT * FROM ' . static::TABLE;
        $db = new Db;
        return $db->query($sql, static::class);
    }


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

    public function delete(): bool // W
    {
        $db = new Db;
        $data = [];

        $fields = get_object_vars($this);

        if(!array_key_exists('id',$fields)){
            return false;
        }
        $data[':id'] = $fields['id'];

        $sql = 'DELETE FROM '.static::TABLE.
            ' WHERE id=:id';

        $db->insert($sql,$data);
        return true;
    }

    public function findById(int $id):array // W
    {
        $db = new Db();
        $sql = 'SELECT * FROM '. static::TABLE.
            ' WHERE id=:id';

        $data[':id'] = $id;
        return $db->query($sql,static::class,$data);
    }


}