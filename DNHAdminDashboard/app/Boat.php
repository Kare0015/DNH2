<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{
    protected $fillable = [
        'id', 'member_id', 'boatname', 'boatlength', 'mainboat',
    ];

    public function member()
    {
        return $this->belongsTo('App\Member');
    }
}
