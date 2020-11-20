<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public $guarded = [];

    // public function products()
    // {
    //     return $this->belongsToMany('App\Product')->withPivot('sale', 'start', 'end', 'price');
    // }

    public function shopdetails()
    {
        return $this->hasMany('App\ShopDetails');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }


}
