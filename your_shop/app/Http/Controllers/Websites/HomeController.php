<?php

namespace App\Http\Controllers\Websites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('websites.home.index',compact('products'));
    }

    // view cart
    public function cart()
    {
        $date = Carbon::now();
        // dd(session()->get('cart'));
        return view('websites.home.cart',compact('date'));
    }
    
    // add to cart store in session
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        // if has in session
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } 
        else 
        {
            $cart[$id] = [
                "pro_id" => $product->id,
                "cat_id" => $product->cat_id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        // add to session
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function updateCart(Request $request){
        if($request->id and $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    // remore cart from session
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
