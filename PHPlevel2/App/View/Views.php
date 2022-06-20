<?php

namespace App\View;

use \App\Models\Article;

class Views
{

    protected array $data = [];

    /**
     * save in field name given value
     * @param string $name
     * @param $value
     * @return void
     */
//    public function assign(string $name, $value): void
//    {
//        $this->data[$name] = $value;
//    }


    /**
     * get saved data
     * @return array
     */
//    public function getData(): array
//    {
//        return $this->data;
//    }

    public function __set(string $name, $value): void
    {
        $this->data[$name] = $value;
    }

    public function __get(string $name)
    {
        return $this->data[$name] ?? null;
    }

    public function __isset(string $name): bool
    {
        return (isset($this->data[$name]));
    }


    /**
     * include template
     * @param string $template
     * @return void
     */
    public function display(string $template): void
    {
        include __DIR__ . '/../../templates/' . $template;
    }


    /**
     * render template
     * @param $template
     * @return string
     */
    public function render($template):string
    {
        return include __DIR__ . '/../templates/' . $template;
    }



}
