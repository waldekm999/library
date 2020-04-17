<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'client', 'estimated_on', 'loaned_on', 'returned_on'
    ];

    public function book() {
        return $this->belongsTo('App\Models\Book');
    }
}
