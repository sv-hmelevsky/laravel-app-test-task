<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show() {
        $article = Article::with('comments', 'tags', 'state')->first();
        return new ArticleResource($article);
    }
}
