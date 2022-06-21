<?php

namespace App\Controllers;

class AdminWebThird extends AdminWebMain
{
    protected const TEMP = 'HW03/';


    public function access(): bool
    {
        return $this->checkAdmin();
    }

}