<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Colour extends Model
{
    use InteractsWithMedia;

    public $guarded = [];

    public function products()
        {
            return $this->belongsToMany('App\Product');
        }   
}
