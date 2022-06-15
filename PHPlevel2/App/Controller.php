<?php

namespace App;

use App\Models\Cookie;
use App\View\Views;

abstract class Controller
{

    protected Views $view;
    protected string $userLog = 'unknown';
    protected string $userPass = '';
    protected bool $confirm = false;
    protected bool $Admin = false;


    /**
     * Validates user cookie data
     */
    public function __construct()
    {
        $cook = new Cookie();
        //$cook->setCookie('Zeliboba','1234');
        if(isset($_COOKIE) && !empty($_COOKIE)) {
            $this->userLog = $_COOKIE['log'] ?: 'unknown';
            $this->userPass = $_COOKIE['pass'] ?: '';
            $this->confirm = $cook->checkPassword($this->userLog,$this->userPass);
        }

        $this->view = new Views();
    }


    public function access(): bool
    {
        return true;
    }


    /**
     * Grants access rights to the controller
     * @param $action
     * @return void
     */
    public function action($action)
    {
        if( false === $this->access()){
            die('LOCK ACCESS');
        }
        return $this->$action();
    }


}