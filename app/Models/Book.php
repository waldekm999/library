<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name', 'year', 'publication_place', 'pages', 'price',
    ];

    public function isbn(){
        return $this->hasOne('App\Models\Isbn');
    }
}
