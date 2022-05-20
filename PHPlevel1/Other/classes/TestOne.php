<?php

require_once __DIR__.'/TestClass.php';

class TestOne extends TestClass
{

    protected string $type;

    public function __construct(string $name, int $number)
    {
        $this->name = $name;
        $this->number = $number;
    }

    protected function show(): string
    {
        return $this->name;
    }

    public function getAll(): string
    {
        return '#'.$this->number. '-->'.$this->show();
    }




}