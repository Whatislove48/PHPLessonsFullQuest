<?php

namespace Application;

class View
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
        include __DIR__ . '/../templates/' . $template;
    }


}