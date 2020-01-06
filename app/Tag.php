<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Массовые назначения
    protected $fillable = ['tags', 'created_at', 'updated_at'];

    // Полиморфная связь со статьямиs
    public function articles()
    {
        return $this->morphedByMany('App\Article', 'tagable');
    }
}
