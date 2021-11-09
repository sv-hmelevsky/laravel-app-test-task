<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'img', 'slug'];

    public $dates = ['published_at'];

    /**
     * Ограничение длинные выводимого тела статьи используя хелпер Laravel
     * @return string
     */
    public function getBodyPreview()
    {
        return Str::limit($this->body, 100);
    }

    /**
     * Вывод форматированной даты создания, используя функцию библиотеки Carbon (встроена в Laravel)
     * @return mixed
     */
    public function createdAtForHumans()
    {
        return $this->published_at->diffForHumans();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function state()
    {
        return $this->hasOne(State::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Скоуп на получение статей с лимитом
     * @param $query
     * @param int $limit
     * @return mixed
     */
    public function scopeLastWithLimit($query, $limit = 6)
    {
        return $query->with('tags', 'state')
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * Скоуп на получение статей с пагинацией.
     * @param $query
     * @param $numbers
     * @return mixed
     */
    public function scopeAllPaginate($query, $numbers)
    {
        return $query->with('tags', 'state')->orderBy('created_at', 'desc')->paginate($numbers);
    }

    /**
     * Скоуп на получение статей по параметру slug.
     * @param $query
     * @param $slug
     * @return mixed
     */
    public function scopeFindBySlug($query, $slug)
    {
        return $query->with('comments', 'tags', 'state')->where('slug', $slug)->firstOrFail();
    }

    /**
     * Скоуп на получение статей по параметру tag
     * @param $query
     * @return mixed
     */
    public function scopeFindByTag($query)
    {
        return $query->with('tags', 'state')->orderBy('created_at', 'desc')->paginate(10);
    }
}
