<?php

namespace App;

use App\Models\Cookie;
use App\View\Views;

abstract class Controller
{

    protected Views $view;
    protected string $userLog = 'unknown';
    protected string $userPass = '111';
    protected bool $confirm = false;
    protected bool $Admin = false;


    public function __construct()
    {
        $cook = new Cookie();
        //$cook->setCookie('Zeliboba','1234');
        if(isset($_COOKIE) && !empty($_COOKIE)) {
            $this->userLog = $_COOKIE['log'] ?: 'unknown';
            $this->userPass = $_COOKIE['pass'] ?: '111';
            $this->confirm = $cook->checkPassword($this->userLog,$this->userPass);
        }
        var_dump($this->confirm);
        $this->view = new Views();
    }


    public function access(): bool
    {
        return true;
    }


    public function action($action)
    {
        if( false === $this->access()){
            die('LOCK ACCESS');
        }
        return $this->$action();
    }


}