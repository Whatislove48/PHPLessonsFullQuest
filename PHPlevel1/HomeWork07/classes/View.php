<?php

require_once __DIR__ . '/Article.php';
require_once __DIR__ . '/News.php';


class View
{

    protected $path = __DIR__ . '/../datafiles/data.txt';
    protected $data = [];
    public $test = 25;

    public function __construct()
    {
        $full = file($this->path, FILE_IGNORE_NEW_LINES);
        foreach ($full as $line) {
            $this->data[] = $line;
        }
    }

    //                     назначить, присвоить, приписать
    public function assign($name, $value)
    {
        $this->data[$name] = $value;
    }


    //public function display($template)
    //{
    //    var_dump(json_decode(file_get_contents(__DIR__ . '/../datafiles/records.json'), true)[1]);die;
    //    include __DIR__ . '/../templates/' . $template;
    //}

    public function display($template)
    {
        var_dump(json_decode(file_get_contents(__DIR__ . '/../datafiles/records.json'), true)[1]);
        include __DIR__ . '/../templates/' . $template;
    }


    public function render($template)
    {
        return include __DIR__ . '/../templates/' . $template;
    }

    public function getRecords()
    {
        return $this->data;
    }


}
