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

    
    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function shops()
    {
        return $this->belongsToMany('App\Shop')->withPivot('sale', 'start', 'end');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function formats()
    {
        return $this->belongsToMany('App\Format');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
}
