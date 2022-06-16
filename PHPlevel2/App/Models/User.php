<?php

namespace App\Models;

use App\Models\Cookie;

class User extends Cookie
{

    protected int $id;
    protected string $login;
    protected string $password;
    public const TABLE = 'users';


    public function __construct(string $log, string $pass)
    {
        if (empty($log) && empty($pass)){
            throw new \Exception('Invalid login or password');
        }
            $this->login = $log;
            $this->password = $pass;
    }


    public function getAllUsers(): array
    {
        return parent::findAll();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function saveUserData(): void
    {
        $this->save();
    }


}