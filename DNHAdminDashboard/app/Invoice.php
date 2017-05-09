<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'description',
        'date'
    ];

//    public function scopehasDescription($query){
//
//    }

    public function member()
    {
        return $this->belongsTo('App\Member');
    }

}
