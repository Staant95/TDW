<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

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

    public function wishlist()
        {
            return $this->hasOne('App\Wishlist');
        }

    public function cart()
        {
            return $this->hasOne(Cart::class);
        }

    public function shops()
        {
            return $this->belongsToMany('App\Shop');
        }

    public function reviews()
        {
            return $this->hasMany('App\Review');
        }   

    public function coupons()
        {
            return $this->belongsToMany('App\Coupon')->withPivot('code');
        }
}
