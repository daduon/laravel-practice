<?php

namespace App;

use App\Models\Admins\Category;
use App\Models\Admins\Product;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id','pro_id','cat_id','name','price','quantity','description','image'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    // public function category(){
    //     return $this->belongsTo(Category::class);
    // }

    // public function product(){
    //     return $this->belongsTo(Product::class);
    // }
}
