<?php

namespace App\Controllers;

use App\Controller;

class AdminWebFour extends Controller
{

    public function showAllArticle(): void
    {

        $articles = new \App\Models\Article();
        $this->view->assign('confirm', $this->confirm);
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