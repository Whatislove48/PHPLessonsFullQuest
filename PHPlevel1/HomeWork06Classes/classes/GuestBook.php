<?php


class GuestBook
{

//-----------------------------------------------------------------------
//                          COMPLETE
    protected array $bookData = [];
    public $path = '';

    public function __construct(string $path)
    {
        if (isset($path) && $path !== '') {
            $this->path = $path;
            $this->bookData = file($path);
        }
    }

//======================================================================

//-----------------------------------------------------------------------
//                          COMPLETE
    public function getData(): array //    вернет массив с записями
    {
        return $this->bookData;
    }

//======================================================================

//-----------------------------------------------------------------------
//                          COMPLETE
    public function append($text): void
    {
        if (isset($text) && $text !== '') {
            $text = trim($text);
            $this->bookData[] = "\n" . $text;
        }
    }

//======================================================================

//-----------------------------------------------------------------------
//                          COMPLETE
    public function saveData(): void
    {
        if (isset($this->bookData))
            file_put_contents($this->path, $this->bookData);
    }

//======================================================================

}




