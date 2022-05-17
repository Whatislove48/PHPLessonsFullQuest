<?php

require_once __DIR__ . '/GuestBookRecord.php';

class GuestBook
{

    protected $data = [];
    protected $reStore = [];
    protected $path = __DIR__ . '/../GuestBookClasses.txt';


    public function __construct()
    {
        $lines = file($this->path, FILE_IGNORE_NEW_LINES);;
        foreach ($lines as $line) {
            $this->data[] = new GuestBookRecord($line);
        }
    }

    public function getRecords()
    {
        return $this->data;
    }

    public function append($record)
    {
        $this->data[] = $record;
    }

    public function saveRecord()
    {
        foreach ($this->data as $rec){
            $this->reStore[] = $rec->getMessage();
        }
        file_put_contents($this->path,
            implode("\n",$this->reStore));
    }
}

