<?php


require_once __DIR__ . '/../PHPlevel2/App/autoload.php';


$functions =
[
    'title' => function(\App\Models\ArticleRep $article) {
        return $article->getTitle();
    },
    'trimmedText' => function(\App\Models\ArticleRep $article) {
        return mb_strimwidth($article->getText(), 0, 100);
    }
];

$all = new \App\Repositories\ArticleRepository();


