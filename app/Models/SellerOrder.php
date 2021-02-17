<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerOrder extends Model
{
    public static function countClients() {
        return SellerOrder::where('seller_id', auth()->id())->count() ?? 0;
    }

    public static function countOrders($status = null) {
         $cart = Cart::whereHas('product', function ($query) {
            $query->where("seller_id", auth()->id());
        })->where("order_id","!=",null)->where("status", 'delivered');
        if($status) $cart->where("status",$status);
        return $cart->count() ?? 0;
    }
}
