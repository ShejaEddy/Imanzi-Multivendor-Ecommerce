<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
class Shipping extends Model
{
    protected $fillable=['type','price','status'];

    public function seller() {
        return $this->belongsTo(User::class, 'seller_id');
    }
}
