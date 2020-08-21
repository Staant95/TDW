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

    public function sale()
    {
        return $this->belongsTo('App\Sale');
    }

    public function productimgs()
    {
        return $this->hasMany('App\ProductIMG');
    }

    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }

    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    public function formats()
    {
        return $this->belongsToMany('App\Format');
    }
}
