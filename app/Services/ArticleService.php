<?php

namespace App\Services;

use App\Models\Article;

/**
 * Выносим логику статей в отдельный сервис
 * Class ArticleService
 * @package App\Services
 */
class ArticleService
{
    /**
     * Получаем статью по параметру slug
     * @param $request
     * @return mixed
     */
    public function getArticleBySlug($request)
    {
        $slug = $request->get('slug');
        return Article::findBySlug($slug);
    }
}
