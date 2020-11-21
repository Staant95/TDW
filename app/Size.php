<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{

    public $guarded = [];
    
    public function products()
        {
            return $this->belongsToMany('App\Product');
        }   
}
