<?php

namespace App\Controllers;

use App\Controller;
use App\Exceptions\NotFoundExpection;
use App\Models\Article;
use App\Models\Cookie;

class AdminWebFour extends Controller
{

    /**
     * Displays all news
     * @return void
     */
    public function showAllArticle(): void
    {

        $articles = new Article();
        $cook = new Cookie();
        //$cook->setCookie('Zeliboba','1234');
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


    /**
     * Displays one news
     * @return void
     * @throws \Exception
     */
    public function showArticle(): void // W
    {

        if (isset($_GET['id'])) {
            $id = $_GET['id'] ?: 1;
        } else {
            throw new NotFoundExpection('Error 404');
        }

        if (0 === $id) {
            throw new NotFoundExpection('Error 404');
        }

        $article = new Article();
        $this->view->assign('articles', $article->findById($id)[0]);
        $this->view->display('HW04/changeArticle.php');
    }


    /**
     * Deleting exist new in the database
     * @return void
     * @throws \Exception
     */
    public function deleteArticle(): void // W
    {

        if (isset($_GET['id'])) {
            $id = $_GET['id'] ?: 1;
        } else {
            throw new NotFoundExpection('Error 404');
        }

        if (0 === $id) {
            throw new NotFoundExpection('Error 404');
        }

        $article = new Article();
        $article->findById($id)[0]->delete();
        header('Location: index.php?ctrl=AdminWebFour&&act=showAllArticle');
    }


    /**
     * Adds new article into database
     * @return void
     */
    public function addArticle(): void // W
    {
        $article = new Article();
        $article->setArticle(   $_POST['author'],
                                $_POST['title'],
                                $_POST['text']);
        $article->save();
        header('Location: index.php?ctrl=AdminWebFour&&act=showAllArticle');
    }

    /**
     * Change existing news in the database
     * @return void
     */
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