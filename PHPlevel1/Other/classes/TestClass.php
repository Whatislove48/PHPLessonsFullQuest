<?php

require_once __DIR__ . '/TestOne.php';

abstract class TestClass
{

    protected string $name;
    protected int $number;

    abstract protected function show(): string;

    abstract protected function getAll(): string;

    public function getSmall(): string
    {
        return 'Biba';
    }

}