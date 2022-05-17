<?php

require_once __DIR__ . '/News.php';
require_once __DIR__ . '/View.php';

class Article
{

    protected $text;

    public function __construct($value)
    {
        $this->text = $value;
    }

    public function getText()
    {
        return $this->text;
    }

}