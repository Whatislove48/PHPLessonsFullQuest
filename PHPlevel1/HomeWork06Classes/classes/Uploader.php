<?php


class Uploader
{

    protected array $upload;
    protected string $info = '';
    protected string $tmpName;
    protected string $name;
    protected string $type;
    protected int $size;


//-----------------------------------------------------------------------

    public function __construct(array $upload)  //   получает имя поля формы
    {
        if (0 === $upload['error'] &&
            0 !== $upload['size'] &&
            '' !== $upload['name'] &&
            '' !== $upload['tmp_name']) {
            $this->upload = $upload;
            $this->name = $upload['name'];
            $this->size = $upload['size'];
            $this->tmpName = $upload['tmp_name'];
            $this->type = $upload['type'];
        } else {
            return exit;
        }
    }


//-----------------------------------------------------------------------

    public function isUploaded(): bool // вернет существует ли поле
    {
        if (0 !== $this->size) {
            return true;
        }
        return false;
    }


//-----------------------------------------------------------------------

    public function showAll(): string
    {
        $this->info .= '<br>' . $this->name;
        $this->info .= '<br>' . $this->type;
        $this->info .= '<br>' . $this->size;
        return $this->info;
    }


//-----------------------------------------------------------------------

    public function upLoad():bool
    {
        $photoFolder = __DIR__ . '/../photoUpload/';
        return move_uploaded_file($this->tmpName, $photoFolder . $this->name);
    }


}