<?php

require_once __DIR__ . '/Article.php';
require_once __DIR__ . '/News.php';


class View
{

    protected $path = __DIR__ . '/../datafiles/testNews.txt';
    protected $data = [];


    //                     назначить, присвоить, приписать
    public function assign($name, $value):void
    {
        $this->data[$name] = $value;
    }

    public function getData():array
    {
        return $this->data;
    }


    //public function display($template)
    //{
    //    var_dump(json_decode(file_get_contents(__DIR__ . '/../datafiles/records.json'), true)[1]);die;
    //    include __DIR__ . '/../templates/' . $template;
    //}

    public function display(string $template):void
    {
        include __DIR__ . '/../templates/' . $template;
    }


    public function render($template)
    {
        return include __DIR__ . '/../templates/' . $template;
    }






}
