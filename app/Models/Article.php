<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'img', 'slug'];

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
        return $this->created_at->diffForHumans();
    }

    public function comments()
    {
        return $this->belongsToMany(Comment::class);
    }

    public function state()
    {
        return $this->hasOne(State::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopeLastWithLimit($query, $limit = 6)
    {
        return $query->with('state', 'tags')
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }
}
