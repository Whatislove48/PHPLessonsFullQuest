<?php

namespace App\Exceptions;


class DbException extends \Exception
{

    protected string $query;

    public function __construct(string $query, string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        $this->query = $query;
        parent::__construct($message, $code, $previous);
    }


    /**
     * return sql query
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }


    /**
     * get all info about errors
     * @return string
     */
    public function getAllInfo():string
    {
        return ' Message -> ' . $this->getMessage().'<br>'.
            ' Line ->' .$this->getLine().'<br>'.
            ' File ->' .$this->getFile().'<br>'.
            ' Query ->' .$this->getQuery();

    }

}