<?php

namespace Application;

use Application\Db;

class Gallary
{

    protected string $path = __DIR__ . '/../image';
    protected array $photo = [];

    public function getAllPhotoName(): array   // W
    {
        $root = scandir($this->path);

        for ($i = 2; $i < count($root); $i++) {
            $this->photo[] = $root[$i];
        }
        return $this->photo;
    }


    public function addImage(array $image): bool  //W
    {
        if (0 !== $image['error'] || 0 === $image['size']) {
            throw new \Exception('Ошибка загрузки');
        }

        move_uploaded_file($image['tmp_name'],
            $this->path . '/' . $image['name']);
        return true;
    }


}