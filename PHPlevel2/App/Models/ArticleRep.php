<?php

namespace App\Models;

use App\Repositories\ArticleRepository;

class ArticleRep
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