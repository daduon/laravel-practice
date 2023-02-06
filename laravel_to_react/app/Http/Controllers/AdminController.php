<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Admin;

class AdminController extends Controller
{
    public function formLogin(){
        return view('auths.login');
    }
}
