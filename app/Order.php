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

    public function shippingcompany()
    {
        return $this->belongsTo('App\ShippingCompany');
    }
}
