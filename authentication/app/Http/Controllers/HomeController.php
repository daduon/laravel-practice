<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admins\Product;
use App\Models\Admins\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('home',compact(['products','categories']));
    } 
       
}
