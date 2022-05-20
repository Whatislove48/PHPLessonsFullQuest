<?php

class Animal
{

    protected Type $type;

    protected function __construct(Type $type)
    {
        $this->type = $type;
    }

    protected function getType(): Type
    {
        return $this->type;
    }

    private function isPig(): bool
    {
        return $this->type->isPig();
    }


}