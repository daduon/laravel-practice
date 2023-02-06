<?php

namespace App\Models\Admins;

use App\Order;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'cat_id','name','price','description','image'
    ];

    public function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }
    // public function orders(){
    //     return $this->hasMany(Order::class,'pro_id');
    // }
}
