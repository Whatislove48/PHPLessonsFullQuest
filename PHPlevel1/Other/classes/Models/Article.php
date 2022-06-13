<?php

namespace classes\Models;


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

    public function findAll(): array
    {
        $sql = 'SELECT * FROM news';
        $db = new \classes\Db();
        return $db->query($sql);

    }




}