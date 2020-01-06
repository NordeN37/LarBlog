<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Article extends Model
{
    // Массовые назначения
    protected $fillable = ['title', 'subtitle', 'slug', 'description_short', 'description', 'image', 'image_show', 'like',  'published', 'created_by', 'modified_by'];

    // Мутатор
    public function setSlugAttribute($value) {
      $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }

    // Полиморфная связь с категориями
    public function categories()
    {
      return $this->morphToMany('App\Category', 'categoryable');
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'tagable');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeLastArticles($query, $count)
    {
      return $query->orderBy('created_at', 'desc')->take($count)->get();
    }
}
