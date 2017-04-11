<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'id', 'transactionname', 'amount', 'category', 'customername'
    ];

    public function category()
    {
        return $this->hasOne('App\Category');
    }
}
