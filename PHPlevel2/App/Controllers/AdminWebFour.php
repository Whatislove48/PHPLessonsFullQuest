<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Cookie;

class AdminWebFour extends Controller
{

    public function showAllArticle(): void
    {

        $articles = new \App\Models\Article();
        $cook = new Cookie();
        $this->view->assign('confirm', $this->confirm);
        $this->view->assign('cook', $cook);
        $this->view->assign('log', $this->userLog);
        $this->view->assign('pass', $this->userPass);
        $this->view->assign('articles', $articles->findAll());
        $this->view->display('HW04/adminWeb.php');
        var_dump($this->confirm);
        echo 'ADMIN';

    }


    public function changeArticle():bool
    {

        return true;
    }

    public function access(): bool // реализуй сохранение имени админа
    {
        return parent::access();
    }


}