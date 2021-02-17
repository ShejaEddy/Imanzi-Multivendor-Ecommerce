<?php

namespace App\Models;
use App\Models\Product;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable=['title','slug','status','seller_id'];


    public function seller() {
        return $this->belongsTo(User::class, 'seller_id');
    }
    public function products(){
        return $this->hasMany('App\Models\Product','brand_id','id')->where('status','active');
    }
    public static function getProductByBrand($slug){
        return Brand::with('products')->where('slug',$slug)->first();
    }
}
