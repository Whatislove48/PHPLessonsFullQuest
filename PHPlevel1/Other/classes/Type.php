<?php

class Type
{

    protected string $type;

    public function __construct(string $type)
    {
        if ('cat' !== $type &&
            'pig' !== $type) {
            throw new Exception('Dont Shaurma');
        }
        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function isPig(): bool
    {
        if('pig' === $this->type){
            return true;
        }
        return false;
    }

}