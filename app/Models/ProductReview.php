<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $fillable=['user_id','product_id','rate','review','status'];

    public function user_info(){
        return $this->hasOne('App\User','id','user_id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public static function getAllReview(){
        return ProductReview::with('user_info')->paginate(10);
    }
    public static function getAllUserReview(){
        return ProductReview::where('user_id',auth()->user()->id)->with('user_info')->paginate(10);
    }
    public static function countUserProductReviews(){
        return ProductReview::where('user_id',auth()->user()->id)->count() ?? 0;
    }
    public static function getAllSellerReview($client_id){
        return ProductReview::whereHas('product', function ($query) use ($client_id) {
            $query->where("seller_id", $client_id);
        })->with('user_info')->paginate();
    }

}
