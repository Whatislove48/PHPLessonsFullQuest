<?php

require_once __DIR__.'/Age.php';
require_once __DIR__.'/Animal.php';
require_once __DIR__.'/Type.php';


class Pig extends Animal
{

    protected int $weight;
    protected Age $age;

    public function __construct(int $weight, Age $age)
    {
        //parent (new Type('pig'));
        parent::__construct(new Type('pig'));
        $this->age = $age;
        $this->weight = $weight;
    }

    protected function getAge(): Age
    {
        return $this->age;
    }

    public function isNeedKill(): bool
    {
        if ($this->weight < 100 &&
            $this->age->getValue() < 10) {
            return true;
        }
        return false;
    }

    public function isPeppa(): bool
    {
        return $this->getType()->isPig();
    }

}