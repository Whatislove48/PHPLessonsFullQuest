<?php


class Uploader
{

    protected $upload;
    protected $info;

//================================================================
//-----------------------------------------------------------------------
//                          COMPLETE
    public function __construct($upload)  //   получает имя поля формы
    {
        if (isset($upload) && $upload['error'] === 0) {
            $this->upload = $upload;
        }
    }

//================================================================
//-----------------------------------------------------------------------
//                          COMPLETE
    public function isUploaded(): bool // вернет существует ли поле
    {
        if (!empty($this->upload) &&
            0 === $this->upload['error'] &&
            0 !== $this->upload['size']) {
            return true;
        } else {
            return false;
        }
    }

//================================================================
//-----------------------------------------------------------------------
//                          COMPLETE
    public function showAll(): string
    {
        if (!empty($this->upload)) {
            $this->info .= '<br>' . $this->upload['name'];
            $this->info .= '<br>' . $this->upload['type'];
            $this->info .= '<br>' . $this->upload['size'];
            return $this->info;
        } else {
            return 'ERROR';
        }

    }

    //================================================================
//-----------------------------------------------------------------------

    public function upLoad() :void
    {
        $root = __DIR__ . '/../photoUpload/';
        if (!empty($this->upload) &&
            0 === $this->upload['error'] &&
            0 !== $this->upload['size']){
            if(isset($this->upload['tmp_name'])){
                $tmp_name = $this->upload['tmp_name'];
                $name = $this->upload['name'];
                move_uploaded_file($tmp_name, $root .$name);
            }
        }
    }


}