<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'id', 'transactionname', 'amount', 'category', 'customername', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
