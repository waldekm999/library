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

    public function loans(){
        return $this->hasMany('App\Models\Loan');
    }

    public function authors()
    {
        return $this->belongsToMany('App\Models\Author');
    }
}
