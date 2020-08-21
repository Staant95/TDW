<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopDetails extends Model
{
    public $guarded = [];

    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }
}
