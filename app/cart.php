<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*cavallo cavallo */

class cart extends Model
{
    public $guarded = [];



    public function products()
        {
            return $this->belongsToMany(Product::class);
        }
}
