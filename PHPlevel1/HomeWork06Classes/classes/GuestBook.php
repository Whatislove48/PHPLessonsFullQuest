<?php


class GuestBook
{

    protected array $bookData = [];
    protected array $record = [];
    protected string $path;

    public function __construct(string $path)
    {
        if (!(is_file($path))) {
            throw new Exception('File not found');
        }
        $this->path = $path;
    }

//-----------------------------------------------------------------------

    public function getData(): array
    {
        $this->bookData = file($this->path);
        return $this->bookData;
    }


//-----------------------------------------------------------------------

    public function append(string $text): bool
    {
        if ('' !== trim($text)) {
            $text = trim($text);
            $this->record[] = "\n" . $text;
            return true;
        }
        return false;
    }

//-----------------------------------------------------------------------

    public function saveData(): bool
    {
        if (false !== file_put_contents($this->path, $this->record, FILE_APPEND)) {
            return true;
        }
        return false;
    }

}




