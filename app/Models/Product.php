<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\User;
use Carbon\Carbon;
use phpDocumentor\Reflection\Types\Boolean;

class Product extends Model
{
    protected $guarded = [];

    protected $cast = [

    ];

    protected $dates = ['deal_start_date','deal_end_date'];

    protected $appends = ["deal_status"];

    public const APPROVAL_STATUS = ['approved','denied','pending'];

    public function getDealStatusAttribute()
    {
        if (!$this->is_deal) {
            return false;
        }

        return today()->isBetween($this->deal_start_date, $this->deal_end_date);
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function cat_info()
    {
        return $this->hasOne('App\Models\Category', 'id', 'cat_id');
    }
    public function sub_cat_info()
    {
        return $this->hasOne('App\Models\Category', 'id', 'child_cat_id');
    }
    public static function getAllProduct(int $seller_id = null, $is_deal = false, $approval_status = 'approved')
    {
        $query = Product::query();
        $query = $query->when($seller_id != null && auth()->user()->role != 'admin', function($q) use($seller_id){
            return $q->where("seller_id",$seller_id);
        });
        $query = $query->when($is_deal != null, function($q) use ($is_deal){
            return $q->where("is_deal",$is_deal);
        });
        $query = $query->when($approval_status != null, function($q) use ($approval_status){
            return $q->where("approval_status",$approval_status);
        });
        return $query->with(['cat_info', 'sub_cat_info', 'seller'])->orderBy('id', 'desc')->paginate(10);
    }
    public function rel_prods()
    {
        return $this->hasMany('App\Models\Product', 'cat_id', 'cat_id')->where('status', 'active')->orderBy('id', 'DESC')->limit(8);
    }
    public function getReview()
    {
        return $this->hasMany('App\Models\ProductReview', 'product_id', 'id')->with('user_info')->where('status', 'active')->orderBy('id', 'DESC');
    }
    public static function getProductBySlug($slug)
    {
        return Product::with(['cat_info', 'rel_prods', 'getReview'])->where('slug', $slug)->first();
    }
    public static function countActiveProduct()
    {
        $data = Product::where('status', 'active')->where('approval_status', 'approved')->count();
        if ($data) {
            return $data;
        }
        return 0;
    }
    public static function countPendingProduct()
    {
        $data = Product::where('approval_status', 'pending')->count();
        if ($data) {
            return $data;
        }
        return 0;
    }
    public static function countBlockedProduct()
    {
        $data = Product::where('approval_status', 'denied')->count();
        if ($data) {
            return $data;
        }
        return 0;
    }
    public static function countDeals($bool = false)
    {
        $data = Product::where('is_deal', true)->get();
        if(!$data) return 0;
        if ($bool)
            return count( $data->filter(fn($product) => today()->isBetween($product->deal_start_date, $product->deal_end_date))) ?? 0;

        return count( $data->filter(fn($product) => !today()->isBetween($product->deal_start_date, $product->deal_end_date))) ?? 0;
    }
    public static function countProductApprovalStatus($status)
    {
        $data = Product::where('approval_status', $status)->where("seller_id",auth()->id())->count();
        if ($data) {
            return $data;
        }
        return 0;
    }

    public function carts()
    {
        return $this->hasMany(Cart::class)->whereNotNull('order_id');
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class)->whereNotNull('cart_id');
    }
}
