<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'naam'
    ];

    public function transaction()
    {
        return $this->hasOne('App\Transaction');
    }
}
