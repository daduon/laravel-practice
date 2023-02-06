<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id','pro_id','cat_id','name','price','quantity','description','image'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
