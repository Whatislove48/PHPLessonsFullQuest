<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;
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

    }


    public function access(): bool // реализуй сохранение имени админа
    {
        return parent::access();
    }


    public function showArticle(): void // W
    {

        if (isset($_GET['id'])) {
            $id = $_GET['id'] ?: 1;
        } else {
            throw new \Exception('Error 404');
        }

        if (0 === $id) {
            throw new \Exception('Error 404');
        }

        $article = new \App\Models\Article();
        $this->view->assign('articles', $article->findById($id)[0]);
        $this->view->display('HW04/changeArticle.php');

    }


    public function deleteArticle(): void // W
    {

        if (isset($_GET['id'])) {
            $id = $_GET['id'] ?: 1;
        } else {
            throw new \Exception('Error 404');
        }

        if (0 === $id) {
            throw new \Exception('Error 404');
        }

        $article = new \App\Models\Article();
        $article->findById($id)[0]->delete();

        header('Location: index.php?ctrl=AdminWebFour&&act=showAllArticle');

    }

    public function addArticle(): void // W
    {
        $article = new \App\Models\Article();
        $article->setArticle(   $_POST['author'],
                                $_POST['title'],
                                $_POST['text']);
        $article->save();

        header('Location: index.php?ctrl=AdminWebFour&&act=showAllArticle');
    }

    public function changeArticle(): void // W
    {
        $articles = new Article();
        $article = $articles->findById($_POST['id'])[0];
        $article->setArticle(
            $_POST['author'],
            $_POST['title'],
            $_POST['text']);
        $article->save();

        header('Location: index.php?ctrl=AdminWebFour&&act=showAllArticle');
    }


}