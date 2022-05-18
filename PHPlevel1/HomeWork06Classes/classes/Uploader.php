<?php


class Uploader
{

    protected array $upload;
    protected string $info = '';
    protected string $tmpName;
    protected bool $isUploaded = false;

//-----------------------------------------------------------------------

    public function __construct(array $upload)  //   получает имя поля формы
    {
        if (0 === $upload['error'] &&
            0 !== $upload['size'] &&
            '' !== $upload['name'] &&
            '' !== $upload['tmp_name']) {
            $this->isUploaded = true;
            $this->upload = $upload;
            $this->tmpName = $upload['tmp_name'];
        }
    }


//-----------------------------------------------------------------------

    public function isUploaded(): bool // вернет существует ли поле
    {
        return $this->isUploaded;
    }


//-----------------------------------------------------------------------

    public function showAll(): string
    {
        if ($this->isUploaded) {
            $this->info .= '<br>' . $this->upload['name'];
            $this->info .= '<br>' . $this->upload['type'];
            $this->info .= '<br>' . $this->upload['size'];
            return $this->info;
        }

        return '';
    }


//-----------------------------------------------------------------------

    public function upLoad():bool
    {
        $photoFolder = __DIR__ . '/../photoUpload/';
        return move_uploaded_file($this->tmpName, $photoFolder . $this->upload['name']);
    }


}