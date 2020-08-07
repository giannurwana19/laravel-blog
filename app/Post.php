<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['judul', 'content', 'category_id', 'gambar', 'slug'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
