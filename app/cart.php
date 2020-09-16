<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*pony pony pony*/

class cart extends Model
{
    public $guarded = [];



    public function products()
        {
            return $this->belongsToMany(Product::class);
        }
}
