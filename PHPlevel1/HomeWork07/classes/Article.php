<?php

require_once __DIR__ . '/News.php';
require_once __DIR__ . '/View.php';

class Article
{

    protected string $text;
    protected string $title;
    protected int $number;

    public function __construct($number, $title, $text)
    {
        $this->text = $text;
        $this->title = $title;
        $this->number = $number;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function showNews(): string
    {
        return $this->number . "\n" .
            $this->title . "\n" .
            $this->text;

    }


}