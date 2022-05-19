<?php

class Age
{

    protected int $value;

    public function __construct(int $age)
    {
        if ($age < 0 || $age > 15) {
            throw new Exception('Недопустимый возраст');
        }
        $this->value = $age;
    }

    public function getValue(): int
    {
        return $this->value;
    }


}