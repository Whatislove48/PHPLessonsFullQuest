<?php

namespace App\Models;


use App\Db;
use App\Exceptions\DbException;
use App\Exceptions\NotFoundExpection;

class Article extends \App\Model
{

    protected int $id;
    protected string $title;
    protected string $author;
    protected string $text;
    public const TABLE = 'news';


    /**
     * @param string $author
     * @param string $title
     * @param string $text
     */
    public function setArticle(string $author, string $title, string $text): void
    {
        $this->author = $author;
        $this->title = $title;
        $this->text = $text;
    }


    /**
     * @return string
     */
    public function getAll(): string
    {
        return 'Id ->' . $this->id . '<br>' .
            'Author ->' . $this->author . '<br>' .
            'title ->' . $this->title . '<br>' .
            'text -> ' . $this->text . '<br>';
    }


    /**
     * @throws DbException
     * @throws NotFoundExpection
     * @return array
     */
    public static function findAllArticle(): array
    {

        $sql = 'SELECT * FROM '.static::TABLE;
        $db = new Db;
        $res = $db->query($sql, static::class);
        if(empty($res)){
            throw new NotFoundExpection('404 - Field not found ');
        }
        return $res;

    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }


    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }


    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

}