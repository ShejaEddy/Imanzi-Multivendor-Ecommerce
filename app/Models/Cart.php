<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'product_id', 'order_id', 'quantity', 'amount', 'price', 'status'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
    public static function countUserSuccessDelivery()
    {
        return self::where([["user_id", auth()->id()], ["status", "delivered"], ["order_id", "!=", null]])->count();
    }
    public static function countUserPendingDelivery()
    {
        return self::where([["user_id", auth()->id()], ["order_id", "!=", null]])->whereIn("status", ['new', 'process'])->count();
    }
}
