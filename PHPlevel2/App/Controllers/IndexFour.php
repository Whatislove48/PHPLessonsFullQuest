<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Cookie;

class IndexFour extends Controller
{


    public function showAllArticle()
    {

        $articles = new \App\Models\Article();
        $this->view->assign('confirm',$this->confirm);
        $this->view->assign('articles',$articles->findAll());
        $this->view->display('HW04/tempMain.php');
        var_dump($this->confirm);

    }


//    public function access(): bool
//    {
//
//        $cook = new Cookie();
//        if($cook->checkPassword($this->userLog,$this->userPass)){
//            return true;
//        }
//        return false;
//
//    }


}