<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    // Из коробки связи работают и без явного указания первичного ключа.
    // Но при вызове метода increment() для экземпляра State, код ORM ищет первичный ключ -- id, а не article_id.
    protected $primaryKey = 'article_id';
    protected $fillable = ['likes', 'views', 'article_id'];

    public $timestamps = false;
}
