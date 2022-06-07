<?php

namespace App;

use mysql_xdevapi\Exception;

abstract class Model
{

    public const TABLE = '';


    public function query(string $sql, string $class, $data = [])
    {

    }


    public function insert():void  // W
    {
        $db = new Db();
        $fields = get_object_vars($this);

        $data = [];
        $cols = [];

        foreach ($fields as $name => $value){
            if('id' === $name){
                continue;
            }
            $cols[] = $name;
            $data[':'.$name] = $value;
        }

        $sql = "INSERT INTO ".static::TABLE. " ( ".
            implode(',',$cols).') 
            VALUES ('. implode(',', array_keys($data)).')';

        $db->insert($sql,$data);
    }




}