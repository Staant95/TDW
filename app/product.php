<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public $guarded = [];


    public function carts()
            {
                return $this->belongsToMany(Cart::class);
            }
}
