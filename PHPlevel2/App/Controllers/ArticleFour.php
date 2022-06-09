<?php

namespace App\Controllers;

use App\Controller;

class ArticleFour extends Controller
{


    public function showArticle()
    {

        if (isset($_GET['id'])) {
            $id = $_GET['id'] ?: 0;
        }
        else{
            throw new \Exception('404');
        }

        if (0 === $id) {
            throw new \Exception('404');
        }

        $articles = new \App\Models\Article();
        $this->view->assign('article', $articles->findById($id)[0]);
        $this->view->display('HW04/tempOneNew.php');

    }


}