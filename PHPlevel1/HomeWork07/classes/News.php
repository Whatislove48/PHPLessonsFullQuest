<?php

require_once __DIR__ . '/Article.php';
require_once __DIR__ . '/View.php';

class News
{

    protected string $path = __DIR__ . '/../datafiles/testNews.txt';
    protected array $news = [];

    public function __construct()
    {
        $j = 0;
        $flag = true;
        $start = false;
        $text = $title = '';
        if (is_file($this->path) === false) {
            return exit;  // здесь должно быть исключение
        }
        $full = file($this->path, FILE_IGNORE_NEW_LINES);

        for ($i = 1; isset($full[$i]); $i++) {
            if (trim($full[$i]) === '') {  // number
                $this->news[] = new Article($j, $title, $text);
                $text = '';
                $j += 1;
                $i += 1;
                $flag = true;
                continue;
            }
            if ($flag) {             // title
                $title = $full[$i];
                $flag = false;
                continue;
            }
            $text .= $full[$i];     // Text
        }
    }


    public function getNews(): array
    {
        return $this->news;
    }

}
