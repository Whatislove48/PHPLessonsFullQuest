<?php

require_once __DIR__ . '/News.php';
require_once __DIR__ . '/View.php';

class Article
{

    protected string $text;
    protected string $title;
    protected string $author;
    protected int $id;

    public function __construct(int    $id,
                                string $author,
                                string $title,
                                string $text)
    {
        $this->author = $author;
        $this->title = $title;
        $this->text = $text;
        $this->id = $id;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getId(): int
    {
        return $this->id;
    }


}