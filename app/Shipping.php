<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public $guarded = [];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
