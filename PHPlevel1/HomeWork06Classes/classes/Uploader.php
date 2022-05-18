<?php


class Uploader
{

    protected array $upload;
    protected string $info = '';
    protected string $tmpName;

//-----------------------------------------------------------------------

    public function __construct(array $upload)  //   получает имя поля формы
    {
        if (0 === $upload['error'] &&
            0 !== $upload['size'] &&
            '' !== $upload['name'] &&
            '' !== $upload['tmp_name']) {
            $this->upload = $upload;
            $this->tmpName = $upload['tmp_name'];
        } else {
            return exit;
        }
    }


//-----------------------------------------------------------------------

    public function isUploaded(): bool // вернет существует ли поле
    {
        if (0 !== $this->upload['size']) {
            return true;
        }
        return false;
    }


//-----------------------------------------------------------------------

    public function showAll(): string
    {
        $this->info .= '<br>' . $this->upload['name'];
        $this->info .= '<br>' . $this->upload['type'];
        $this->info .= '<br>' . $this->upload['size'];
        return $this->info;
    }


//-----------------------------------------------------------------------

    public function upLoad():bool
    {
        $photoFolder = __DIR__ . '/../photoUpload/';
        return move_uploaded_file($this->tmpName, $photoFolder . $this->upload['name']);
    }


}