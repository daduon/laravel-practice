<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admins\Product;
use App\Models\Admins\Category;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addToCart(Request $request){
        $data = [
            'user_id' => $request->user_id,
            'pro_id' => $request->pro_id,
            'cat_id' => $request->cat_id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'image' => $request->image,
        ];
        
        Cart::create($data);
        return redirect('/');
    }

    public function viewCart(){
        $date = Carbon::now();
        return view('cart',compact('date'));
    }

    public function updateCart(Request $request,$id){
        $cart = Cart::find($id);
        $data = [
            'quantity' => $request->quantity
        ];
        $cart->update($data);
        return redirect()->back();
    }

    public function removeCart($id){
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }
}
