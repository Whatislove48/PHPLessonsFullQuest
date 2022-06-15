<?php

namespace App\Exceptions;

class MultiErrors extends \Exception
{

    protected array $errors;


    public function addError(\Exception $er): void
    {
        $this->errors[] = $er;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function empty():bool
    {
        return empty($this->errors);
    }


}