<?php

namespace Application;

use Application\Db;

class Gallary
{

    protected string $path = __DIR__ . '/../image';
    protected array $photo = [];

    public function getAllPhotoName(): array
    {
        $root = scandir($this->path);

        for ($i = 2; $i < count($root); $i++) {
            $this->photo[] = $root[$i];
        }
        return $this->photo;
    }


    public function addImage(array $image): bool
    {
        if (0 !== $image['error'] || 0 === $image['size']) {
            throw new \Exception('Ошибка загрузки');
        }

        move_uploaded_file($image['tmpName'],
            $this->path . '/' . $image['name']);
        return true;
    }


}