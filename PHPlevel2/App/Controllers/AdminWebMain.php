<?php

namespace App\Controllers;

use App\Controller;
use App\Exceptions\InputExpection;
use App\Exceptions\NotFoundExpection;
use App\Models\Article;
use App\Models\ArticleRep;
use App\Repositories\ArticleRepository;

abstract class AdminWebMain extends Controller
{

    protected const TEMP = '';


    /**
     * Displays all news
     * @return void
     */
    public function showAllArticle(): void
    {
        $articles = new ArticleRepository();
        $this->view->confirm = $this->confirm;
        $this->view->cook = $this->cook;
        //$this->view->log = $this->userLog;
        //$this->view->pass = $this->userPass;
        $this->view->user = $this->cook->getCurrentUser($this->userLog, $this->userPass);
        $this->view->articles = $articles->findAll();
        $this->view->display(static::TEMP . 'adminWeb.php');
    }


    public function access(): bool
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
        if (!isset($_POST['changeId'])) {
            throw new NotFoundExpection('Параметр не передан', 500);
        }

        if ($_POST['changeId'] <= 0) {
            throw new NotFoundExpection('Не найдено', 404);
        }
        $id = $_POST['changeId'];
        $article = new ArticleRepository();
        $this->view->article = $article->findById($id);
        $this->view->display(static::TEMP . 'changeArticle.php');
    }


    /**
     * Deleting exist new in the database
     * @return void
     * @throws \Exception
     */
    public function deleteArticle(): void // W
    {
        if (!isset($_POST['delId'])) {
            throw new NotFoundExpection('Параметр не передан', 500);
        }

        if ($_POST['delId'] <= 0) {
            throw new NotFoundExpection('Не найдено', 404);
        }
        $id = $_POST['delId'];
        $article = new ArticleRepository();
        $article->delete($article->findById($id));
        header('Location: http://localhost/index.php');
    }


    /**
     * Adds new article into database
     * @return void
     */
    public function addArticle(): void // W
    {
        if (!isset($_POST['author']) || !isset($_POST['title']) ||
            !isset($_POST['text'])) {
            throw new InputExpection('Неверный ввод', 228);
        }

        if (empty($_POST['author']) || empty($_POST['title']) ||
            empty($_POST['text'])) {
            throw new InputExpection('Неверный ввод', 228);
        }

        $art = new ArticleRepository();
        $article = new ArticleRep();
        $article->setArticle(
            $_POST['author'],
            $_POST['title'],
            $_POST['text']);
        $art->save($article);
        header('Location: http://localhost/index.php');
    }

    /**
     * Change existing news in the database
     * @return void
     */
    public function changeArticle(): void // W
    {
        if (!isset($_POST['author']) || !isset($_POST['title']) ||
            !isset($_POST['text']) || !isset($_POST['id'])) {
            throw new InputExpection('Неверный ввод', 228);
        }

        if (empty($_POST['author']) || empty($_POST['title']) ||
            empty($_POST['text']) || empty($_POST['id'])) {
            throw new InputExpection('Неверный ввод', 228);
        }

        $articles = new ArticleRepository();
        $article = $articles->findById($_POST['id']);
        var_dump($article);
        $article->setArticle(
            $_POST['author'],
            $_POST['title'],
            $_POST['text']);
        $articles->save($article);
        header('Location: http://localhost/index.php');
    }


    public function checkAdmin(): bool
    {
        if (('Admin' === $this->userLog || 'Boss' === $this->userLog)
            && $this->confirm) {
            return true;
        }
        return false;
    }

}
