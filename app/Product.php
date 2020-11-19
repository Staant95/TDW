<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class product extends Model implements HasMedia
{
    use InteractsWithMedia;

    public $guarded = [];


    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }

        
    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function shops()
    {
        return $this->belongsToMany('App\Shop')->withPivot('sale', 'start', 'end', 'price');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function formats()
    {
        return $this->belongsToMany('App\Format')->withPivot('quantity');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function wishlists()
    {
        return $this->belongsToMany('App\Wishlist');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order')
            ->withPivot('price', 'quantity');
    }
}
