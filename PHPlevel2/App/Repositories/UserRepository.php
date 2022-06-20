<?php

namespace App\Repositories;

use App\Models\UserRep;

class UserRepository extends MainRepository
{

    public const TABLE = 'users';





//    public function findAllUsers(): array
//    {
//
//        $sql = 'SELECT * FROM '.static::TABLE;
//        return $this->query($sql, static::class);
//    }


    /**
     * find info in database for given id
     * @param int $id
     */
    public function findById(int $id): UserRep // W
    {
        $sql = 'SELECT * FROM ' . static::TABLE .
            ' WHERE id=:id';

        $data[':id'] = $id;
        return $this->query($sql, static::class, $data)[0];
    }




}