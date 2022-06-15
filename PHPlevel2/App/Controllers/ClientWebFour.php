<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Cookie;

class ClientWebFour extends Controller
{

    /**
     * Displays all news
     * @return void
     */
    public function showAllArticle():void
    {
        $articles = new \App\Models\Article();
        $this->view->assign('confirm',$this->confirm);
        $this->view->assign('articles',$articles->findAll());
        $this->view->display('HW04/tempMain.php');
    }


    /**
     * Displays one news
     * @return void
     * @throws \Exception
     */
    public function showArticle():void
    {

        if (isset($_GET['id'])) {
            $id = $_GET['id'] ?: 1;
        }
        else{
            throw new \Exception('Error 404');
        }

        if (0 === $id) {
            throw new \Exception('Error 404');
        }

        $articles = new \App\Models\Article();
        $this->view->assign('article', $articles->findById($id)[0]);
        $this->view->display('HW04/tempOneNew.php');
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