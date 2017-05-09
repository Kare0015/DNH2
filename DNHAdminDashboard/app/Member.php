<?php

//namespace Tests\Unit;

namespace App;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

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

    public function invoices()
    {
        return $this->hasMany('App\Invoice');
    }

}
