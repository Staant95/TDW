<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
   public $guarded = [];

   public function users()
           {
               return $this->hasMany('App\User');
           }

   public function permissions()
           {
               return $this->belongsToMany('App\Permission');
           }
}
