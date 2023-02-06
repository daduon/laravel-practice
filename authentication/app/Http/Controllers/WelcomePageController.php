<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admins\Product;
use App\Models\Admins\Category;

class WelcomePageController extends Controller
{
    public function welcomePage()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('welcome',compact(['products','categories']));
    }
}
