<?php

namespace App\Controllers;


class AdminWebFirst extends AdminWebMain
{

    protected const TEMP = 'HW01/';


    public function access(): bool
    {
        return $this->checkAdmin();
    }

}