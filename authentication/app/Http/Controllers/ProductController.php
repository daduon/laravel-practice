<?php

namespace App\Http\Controllers;

use App\Models\Admins\Category;
use Illuminate\Http\Request;
use App\Models\Admins\Product;

class ProductController extends Controller
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
    
    public function index(){
        $products = Product::all();
        return view('products.index',compact('products'));
    }

    public function productDetail($id){
        $product = Product::find($id);
        return view('products.detail',compact('product'));
    }

    public function productByCategory($id){
        $proByCat = Category::find($id);
        return view('products.index',compact('proByCat'));
    }
}
