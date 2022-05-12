<?php


class GuestBook
{

//-----------------------------------------------------------------------
//                          COMPLETE
    protected array $bookData = [];
    public $path = '';

    public function __construct(string $path)    // конструктор задает путь и заполняет массив записей
    {
        if (isset($path) && $path !== '') {
            $this->path = $path;
            $this->bookData = file($path);
        }
    }

//======================================================================

//-----------------------------------------------------------------------
//                          COMPLETE
    public function getData(): array               //  вернет массив с записями
    {
        return $this->bookData;
    }

//======================================================================

//-----------------------------------------------------------------------
//                          COMPLETE
    public function append($text): void            // добавляет запись в массив записей
    {
        if (isset($text) && $text !== '' && isset($this->bookData)) {
            $text = trim($text);
            $this->bookData[] = "\n" . $text;
        }
    }

//======================================================================

//-----------------------------------------------------------------------
//                          COMPLETE
    public function saveData(): void       //  записывает в файл массив записей
    {
        if (isset($this->bookData))
            file_put_contents($this->path, $this->bookData);
    }

//======================================================================

}




