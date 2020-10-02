<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Payment extends Model
{
    public $guarded = [];

    public function users() {
        return $this->belongsToMany(User::class)
        ->withPivot('card_number', 'expiration_date', 'security_code');
    }
}
