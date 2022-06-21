<?php

namespace App\Repositories;


use App\Exceptions\DbException;
use App\Exceptions\NotFoundExpection;
use App\Models\Article;
use App\Models\ArticleRep;

class ArticleRepository extends MainRepository
{

    public const CLASSNAME = ArticleRep::class;
    public const TABLE = 'news';



//    public function findAllArticle(): array
//    {
//
//        $sql = 'SELECT * FROM '.static::TABLE;
//        return $this->query($sql, static::class);
//    }


    /**
     * find info in database for given id
     * @param int $id
     * @return ArticleRep
     */
    public function findById(int $id) : ArticleRep
    {
        $sql = 'SELECT * FROM ' . static::TABLE .
            ' WHERE id=:id';

        $data[':id'] = $id;
        return $this->query($sql, ArticleRep::class, $data)[0];
    }



}