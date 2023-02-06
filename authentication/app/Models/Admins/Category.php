<?php

namespace App\Models\Admins;

use App\Order;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'name'
    ];

    public function products(){
        return $this->hasMany(Product::class,'cat_id');
    }
    // public function order(){
    //     return $this->hasOne(Order::class,'cat_id');
    // }

}
