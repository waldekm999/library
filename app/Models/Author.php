<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'lastname', 'firstname', 'genres', 'birthday',
    ];

    public function books()
    {
        return $this->belongsToMany('App\Models\Book');
    }
}
