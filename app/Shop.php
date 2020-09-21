<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public $guarded = [];

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function shopdetails()
    {
        return $this->hasMany('App\ShopDetails');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }


}
