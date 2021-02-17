<?php

namespace App;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Shipping;
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
        'name', 'email', 'password','role','photo','status','provider','provider_id',
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

    public function brands(){
        return $this->hasMany(Brand::class);
    }

    public function shippings(){
        return $this->hasMany(Shipping::class);
    }

    public function orders(){
        return $this->hasMany('App\Models\Order');
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public function coupons(){
        return $this->hasMany('App\Models\Coupon');
    }

    public function sellerOrders(){
        return $this->belongsToMany(Order::class, 'seller_orders', 'seller_id', 'order_id');
    }

    public function products(){
        return $this->hasMany('App\Models\Product', 'seller_id');
    }

    public static function countUsers($role){
        return self::where("role",$role)->count() ?? 0;
    }
}
