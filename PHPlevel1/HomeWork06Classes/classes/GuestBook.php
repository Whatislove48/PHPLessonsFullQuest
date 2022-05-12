<?php


class GuestBook
{

//-----------------------------------------------------------------------
    protected array $bookData = [];
    public $path = '';
    public function __construct(string $path)
    {
        $this->path = $path;
        //$this->bookData = file($path,FILE_IGNORE_NEW_LINES);
        //$this->bookData[] = $path;
    }

//======================================================================

//--------------------------COMPLETE-----------------------------
    public function getData()
    {
        return $this->bookData;
    }

//======================================================================

//-----------------------------------------------------------------------
    public function append($text)
    {
        $text = trim($text);
        $this->bookData[] = $text;
    }

//======================================================================

//-----------------------------------------------------------------------
    public function save()
    {
        file_put_contents($this->path,$this->bookData);
    }

}




