<?php

namespace App\Controllers;


class AdminWebFour extends AdminWebMain
{

    protected const TEMP = 'HW04/';

    public function access(): bool
    {
        return $this->checkAdmin();
    }

}