<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $guarded = [];

    public function user()
        {
            return $this->belongsTo('App\User');
        }

    public function shipping()
    {
        return $this->belongsTo('App\Shipping');
    }

    public function address() {
        return $this->belongsTo('App\Address');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
