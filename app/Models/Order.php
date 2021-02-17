<?php

namespace App\Models;

use App\Http\Middleware\Seller;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['user_id','order_number','sub_total','quantity','delivery_charge','status','total_amount','first_name','last_name','country','post_code','address1','address2','phone','email','payment_method','payment_status','shipping_id','coupon'];

    protected $cast=[];

    public const ORDER_STATUS = ['new','process','delivered','cancel','returned','replaced'];

    public function sellers()
    {
        return $this->belongsToMany(User::class, 'seller_orders', 'order_id', 'seller_id');
    }

    public function cart_info(){
        return $this->hasMany(Cart::class,'order_id','id');
    }

    public static function getAllOrder($id){
        return Order::with('cart_info')->find($id);
    }

    public static function countActiveOrder(){
        $data=Order::count();
        if($data){
            return $data;
        }
        return 0;
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function shipping(){
        return $this->belongsTo(Shipping::class,'shipping_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
