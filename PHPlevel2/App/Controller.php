<?php

namespace App;

use App\View\Views;

abstract class Controller
{

    protected Views $view;
    protected string $userLog;
    protected string $userPass;
    protected bool $confirm = false;


    public function __construct()
    {
        if(isset($_COOKIE) && !empty($_COOKIE)) {
            $this->userLog = $_COOKIE['log'] ?: 'unknown';
            $this->userPass = $_COOKIE['pass'] ?: '111';
            $this->confirm = true;
        }
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