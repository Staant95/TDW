<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductIMG extends Model
{
    public $guarded = [];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
