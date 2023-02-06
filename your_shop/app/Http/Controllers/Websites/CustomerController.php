<?php

namespace App\Http\Controllers\Websites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function register(){
        return view('websites.user.register');
    }

    public function login(){
        return view('websites.user.login');
    }

    public function createCustomer(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email'  => 'required|email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        $input = $request->all();

        $inputArray = array(
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        );

        $user = Customer::create($inputArray);

        if (!is_null($user)) {
            return back()->with('success', 'You have registered successfully.');
        }else {
            return back()->with('error', 'Whoops! some error encountered. Please try again.');
        }
    }

    public function customerLogin(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:6"
        ]);

        $email = $request->email;
        $pass = Hash::make($request->password);
        
        $customer = Customer::where('email','=',$email,'password','=',$pass);
        if($customer){
            return redirect('websites');
        }else{
            return back()->with('error', 'Whoops! invalid username or password.');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('websites/login');
    }

    // public function dashboard()
    // {
    //     if (Auth::check()) {
    //         return view('admins.home.index');
    //     }

    //     return redirect::to("login")->withError('Oopps! You do not have access');
    // }
}
