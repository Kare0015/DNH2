<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'transaction_id'
    ];

    public function transaction()
    {
        return $this->hasMany('App\Transaction');
    }
}
