<?php

namespace App\Models;


use App\Db;

class Article
{

    protected int $id;
    protected string $title;
    protected string $author;
    protected string $text;

//    public function __construct(int $id,
//                                string $author,
//                                string $title,
//                                string $text)
//    {
//        $this->id = $id;
//        $this->author = $author;
//        $this->title = $title;
//        $this->text = $text;
//    }

    public function getAll():string
    {
        return 'Id ->'.$this->id .'<br>'.
            'Author ->'.$this->author .'<br>'.
            'title ->'.$this->title .'<br>'.
            'text -> '.$this->text.'<br>';
    }

    public static function findAll(): array
    {

        $sql = 'SELECT * FROM news LIMIT 4';
        $db = new Db;
        return $db->query($sql,static::class);

    }

    public function getId():int
    {
        return $this->id;
    }

    public function getTitle():string
    {
        return $this->title;
    }


}