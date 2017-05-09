<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
    'id', 'firstname', 'prefix', 'surname', 'email', 'street', 'number', 'postalCode', 'city',
    ];

    public function boats()
    {
        return $this->hasMany('App\Boat');
    }








}
