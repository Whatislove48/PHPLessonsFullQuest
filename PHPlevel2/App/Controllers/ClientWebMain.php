<?php

namespace App\Controllers;

use App\Controller;
use App\Exceptions\InputExpection;
use App\Repositories\ArticleRepository;

abstract class ClientWebMain extends Controller
{

    protected const TEMP = '';

    /**
     * Displays all news
     * @return void
     */
    public function showAllArticle(): void
    {
        $articles = new ArticleRepository();
        //$this->view->assign('confirm', $this->confirm);
        //$this->view->assign('articles', $articles->findAll());
        $this->view->confirm = $this->confirm;
        $this->view->articles = $articles->findAll();
        $this->view->display(static::TEMP . 'tempMain.php');

    }


    /**
     * Displays one new
     * @return void
     */
    public function showArticle(): void
    {
        if (!isset($_POST['ctrl']) || !isset($_POST['action']) ||
            !isset($_POST['id'])) {
            throw new InputExpection('Неверный ввод', 420);
        }
        if (($this->class !== $_POST['ctrl']) ||
            ('showArticle' !== $_POST['action']) ||
            ($_POST['id'] < 0)) {
            throw new InputExpection(' Не найдено', 404);
        }

        //$articles = new \App\Models\Article();
        $articles = new ArticleRepository();
        $this->view->article = $articles->findById($_POST['id']);
        $this->view->display(static::TEMP . 'tempOneNew.php');
    }


    /**
     * Authorization new user if her info not found in database
     * @return void
     */
    public function authorization(): void
    {
        if (!isset($_POST['login']) || !isset($_POST['password'])) {
            throw new InputExpection('Неверный ввод', 420);
        }

        if (strlen($_POST['login']) < 3 && strlen($_POST['password']) < 3) {
            throw new InputExpection('Слишком короткий логин или пароль', 228);
        }
        $log = $_POST['login'];
        $pass = $_POST['password'];

        if ($this->cook->checkPassword($log, $pass)) {
            $this->cook->setCookie($log, $pass);
            //echo('-----------Work If in Autroization-----------');die;
            header('Location: http://localhost/index.php');
            //exit;
        }

        if (!$this->cook->checkPassword($log, $pass)) {
            //echo('-----------Work end Autroization-----------');
            $this->cook->saveUser($log, $pass);
            $this->cook->setCookie($log, $pass);
            header('Location: http://localhost/index.php');
            //exit;
        }

    }

}