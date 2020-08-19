<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function carts() {
        return $this->belongsToMany(Cart::class);
    }
}
