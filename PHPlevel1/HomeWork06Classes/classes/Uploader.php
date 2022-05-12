<?php


class Uploader
{

    protected $upload;


//================================================================
    public function __construct($upload)  //   получает имя поля формы
    {
        if (isset($upload)) {
            $this->upload = $upload;
        }
    }

//================================================================

    public function isUploaded(): bool // вернет существует ли поле
    {
        if (!empty($upload)){
            return true;
        }
        else{
            return false;
        }

    }

//================================================================



}