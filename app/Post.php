<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Symfony\Component\CssSelector\Node\FunctionNode;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['judul', 'content', 'category_id', 'gambar', 'slug', 'user_id'];

    // artinya ini semua melakukan join
    // SELECT 
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
