<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];
    protected $hidden = ['created_at', 'updated_at'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // // mengganti route key dari id menjadi slug
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
