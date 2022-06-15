<?php

namespace App\Controllers;

class AdminWebFirst extends AdminWebFour
{


    public function checkAdmin(): bool
    {
        if (('Admin' === $this->userLog || 'Boss' === $this->userLog)
            && $this->confirm) {
            return true;
        }
        return false;
    }


    public function access(): bool
    {
        return $this->checkAdmin();
    }

}