<?php

namespace App\Models;

use App\Repositories\UserRepository;

class UserRep extends UserRepository
{

    protected int $id;
    protected string $login;
    protected string $password;



    public function setUserInfo(string $login, string $password): void
    {
        $this->login = $login;
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }


}