<?php

require_once __DIR__ . '/News.php';
require_once __DIR__ . '/View.php';

class Article
{

    protected $text;
    protected $title;
    protected $number;

    public function __construct($number, $title, $text)
    {
        $this->text = $text;
        $this->title = $title;
        $this->number = $number;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function showNews()
    {
        return $this->number . "\n" .
            $this->title . "\n" .
            $this->text;

    }

    public function getArticle()
    {
        return $this;
    }


}