<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $guarded = [];

    public function permissions()
               {
                   return $this->belongsToMany('App\Role');
               }
}
