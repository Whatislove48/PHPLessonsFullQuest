<?php

namespace App\Controllers;

use App\Controller;
use App\Exceptions\DbException;
use App\Exceptions\NotFoundExpection;

abstract class ClientWebMain extends Controller
{

    protected const TEMP = '';

    /**
     * Displays all news
     * @return void
     */
    public function showAllArticle(): void
    {
        $articles = new \App\Models\Article();
        //$this->view->assign('confirm', $this->confirm);
        //$this->view->assign('articles', $articles->findAll());
        $this->view->confirm = $this->confirm;
        $this->view->articles = $articles->findAll();
        $this->view->display(static::TEMP . 'tempMain.php');

    }


    /**
     * Displays one news
     * @return void
     * @throws \Exception
     */
    public function showArticle(): void
    {

        if (isset($_GET['id'])) {
            $id = $_GET['id'] ?: 1;
        } else {
            throw new \Exception('Error 404',404);
        }

        if (0 === $id) {
            throw new \Exception('Error 404',404);
        }
        //$articles = new \App\Models\Article();
        $articles = new \App\Repositories\ArticleRepository();
        $this->view->article = $articles->findById($id);
        $this->view->display(static::TEMP . 'tempOneNew.php');
    }


    /**
     * Authorization new user if her info not found in database
     * @return void
     * @throws DbException
     */
    public function authorization(): void
    {
        if (strlen($_POST['login']) < 3 && strlen($_POST['password']) < 3) {
            throw new NotFoundExpection('Слишком короткий логин или пароль');
        }
        $log = $_POST['login'];
        $pass = $_POST['password'];

        if ($this->cook->checkPassword($log, $pass)) {
            $this->cook->setCookie($log, $pass);
            header('Location: index.php?ctrl=' . $this->class . '&&act=showAllArticle');
            exit;
        }
        $this->cook->saveUser($log, $pass);
        $this->cook->setCookie($log, $pass);
        header('Location: index.php?ctrl=' . $this->class . '&&act=showAllArticle');
        exit;
    }

}