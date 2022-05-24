<?php

namespace classes;

class Article
{

    protected string $title;
    protected string $author;
    protected string $text;
    protected string $test = '';

    public function __construct(string $author,
                                string $title,
                                string $text)
    {
        $this->author = $author;
        $this->title = $title;
        $this->text = $text;
    }

    public function getAll():string
    {
        $this->test = 'Aga blya';
        return 'Author ->'.$this->author .'<br>'.
        'title ->'.$this->title .'<br>'.
        'text -> '.$this->text.'<br>'.
            'test ->' .$this->test;

    }


}