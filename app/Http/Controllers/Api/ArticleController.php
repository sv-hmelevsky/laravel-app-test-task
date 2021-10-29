<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(ArticleService $service) {
        $this->articleService = $service;
    }

    /**
     * Вывод содержимого статьи
     * @param Request $request
     * @return ArticleResource
     */
    public function show(Request $request)
    {
        $article = $this->articleService->getArticleBySlug($request);
        return new ArticleResource($article);
    }

    /**
     * Изменение счётчика просмотров
     * @param Request $request
     * @return ArticleResource
     */
    public function viewsIncrement(Request $request)
    {
        $article = $this->articleService->getArticleBySlug($request);
        $article->state->increment('views');
        return new ArticleResource($article);
    }

    /**
     * Изменение счётчика лайков
     * @param Request $request
     * @return ArticleResource
     */
    public function likesIncrement(Request $request)
    {
        $article = $this->articleService->getArticleBySlug($request);
        $inc = $request->get('increment');
        $inc ? $article->state->increment('likes') : $article->state->decrement('likes');

        return new ArticleResource($article);
    }
}
