<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Cart extends Model
{
    public $guarded = [];


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function products()
        {
            return $this->belongsToMany(Product::class);
        }
}
