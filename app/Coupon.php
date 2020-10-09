<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public $guarded = [];
    
    public function users()
        {
            return $this->belongsToMany('App\User')->withPivot('used');
        }
}
