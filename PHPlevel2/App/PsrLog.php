<?php

namespace App;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

class PsrLog extends AbstractLogger implements LoggerInterface
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

    public function getContext(\Throwable $error):array
    {
        return  ['message' => $error->getMessage(),
            'file' => $error->getFile(),
            'line' => $error->getLine(),
            'code' => $error->getCode()];
    }


    /**
     * @param $level
     * @param \Stringable|string $message
     * @param array $context
     * @return void
     */
    public function log($level,  $message, array $context = []): void
    {
        echo 'Log WORK'.'<hr>';
        $put = 'Time -> ' . $this->getTime() . "\n" .
            'File -> ' . $context['file']. "\n" .
            'Line -> ' . $context['line'] . "\n" .
            'Code -> ' . $context['code'] . "\n" .
            'exception message -> ' . $context['message'] . "\n";

        file_put_contents(
            $this->path, $put . "\n", FILE_APPEND);
    }



}