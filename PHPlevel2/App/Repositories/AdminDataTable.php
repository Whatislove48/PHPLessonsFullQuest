<?php

namespace App\Repositories;

use App\Models\ArticleRep;

class AdminDataTable extends MainRepository
{

    public const TABLE = 'news';
    public const CLASSNAME = ArticleRep::class;
    protected array $functions;
    protected array $models;


    public function __construct(array $models, array $functions)
    {
        $this->functions = $functions;
        $this->models = $models;
    }

    public function render()
    {
        $res = [];
        $sql = 'SELECT * FROM '. static::TABLE;

        for($i = 0;$i < count($this->models);$i++){
            foreach ($this->functions as $key => $func){
                $res[$i][$key] = $func($this->models[$i]);
            }
        }
        return $res;
    }

}