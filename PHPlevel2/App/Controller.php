<?php

namespace App;


use App\Repositories\CookieRepository;
use App\View\Views;

abstract class Controller
{

    protected Views $view;
    protected string $userLog = 'unknown';
    protected string $userPass = '';
    protected bool $confirm = false;
    protected CookieRepository $cook;
    protected string $class;


    /**
     * Validates user cookie data
     */
    public function __construct()
    {
        $this->cook = new CookieRepository();

        if(isset($_COOKIE) && !empty($_COOKIE)) {
            $this->userLog = $_COOKIE['log'] ?? 'unknown';
            $this->userPass = $_COOKIE['pass'] ?? '';
            $this->confirm = $this->cook->checkPassword($this->userLog,$this->userPass);
        }

        //$name = explode('\\',static::class);
        //$this->class = $name[(count($name))-1];
        $name = new \ReflectionClass($this);
        $this->class = $name->getShortName();

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