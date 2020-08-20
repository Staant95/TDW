<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    public $guarded = [];

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function shippingaddresses()
        {
            return $this->hasMany('App\ShippingAddress');
        }

    public function orders()
            {
                return $this->hasMany('App\Order');
            }

    public function role()
        {
            return $this->belongsTo('App\Role');
        }

    public function favorite_list()
        {
            return $this->hasOne('App\FavoriteList');
        }

    public function cart() {
        return $this->hasOne(Cart::class);
    }
}
