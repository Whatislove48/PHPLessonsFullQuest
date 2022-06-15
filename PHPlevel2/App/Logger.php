<?php

namespace App;

class Logger
{

    protected string $path = __DIR__ . '/../HomeWork05/logger.txt';
    protected \DateTime $time;

    public function __construct()
    {
        $this->time = new \DateTime();
    }


    public function getTime(): string
    {
        return $this->time->format('d-m-Y - T:H:i:s');
    }


    public function saveLog(\Throwable $error): void
    {
        $put = 'Time -> ' . $this->getTime() . "\n" .
            'File -> ' . $error->getFile() . "\n" .
            'Line -> ' . $error->getLine() . "\n" .
            'Error -> ' . $error->getMessage() . "\n";

        file_put_contents(
            $this->path, $put . "\n", FILE_APPEND);
    }


}