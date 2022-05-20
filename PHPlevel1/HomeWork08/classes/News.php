<?php

require_once __DIR__ . '/Article.php';
require_once __DIR__ . '/View.php';
require_once __DIR__ . '/ConnectBase.php';

class News
{

    protected string $path = __DIR__ . '/../datafiles/testNews.txt';
    protected array $news = [];

    public function __construct(array $news)
    {
        for ($i = 0; $i < count($news); $i++) {
            $this->news[] = new Article( (int) $news[$i]['id'],
                                        $news[$i]['author'],
                                        $news[$i]['title'],
                                        $news[$i]['text']);
        }
    }


    public function getNews(): array
    {
        return $this->news;
    }

}
