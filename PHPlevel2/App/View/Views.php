<?php

namespace App\View;

use \App\Models\Article;

class Views
{

    protected array $data = [];

    public function assign(string $name, $value): void
    {
        $this->data[$name] = $value;
    }

    public function getData(): array
    {
        return $this->data;
    }


    public function display(string $template): void
    {
        include __DIR__ . '/../../templates/' . $template;
    }


    public function render($template)
    {
        return include __DIR__ . '/../templates/' . $template;
    }



}
