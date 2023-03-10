<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // -------------------- [ user registration view ] -------------
    public function index()
    {
        return view('admins.layout.register');
    }

    // --------------------- [ Register user ] ----------------------
    public function userPostRegistration(Request $request)
    {

        // validate form fields
        $request->validate([
            'name'              =>      'required',
            'email'             =>      'required|email',
            'password'          =>      'required|min:6',
            'confirm_password'  =>      'required|same:password',
        ]);

        $input = $request->all();
        // if validation success then create an input array
        $inputArray = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        );

        // register user
        $user = User::create($inputArray);

        // if registration success then return with success message
        if (!is_null($user)) {
            return back()->with('success', 'You have registered successfully.');
        }

        // else return with error message
        else {
            return back()->with('error', 'Whoops! some error encountered. Please try again.');
        }
    }



    // -------------------- [ User login view ] -----------------------
    public function userLoginIndex()
    {
        return view('admins.layout.login');
    }


    // --------------------- [ User login ] ---------------------
    public function userPostLogin(Request $request)
    {

        $request->validate([
            "email" => "required|email",
            "password" => "required|min:6"
        ]);

        $userCredentials = $request->only('email', 'password');

        // check user using auth function

        if (Auth::attempt($userCredentials)) {
            return redirect()->intended('dashboard');
        } else {
            return back()->with('error', 'Whoops! invalid username or password.');
        }
    }


    // ------------------ [ User Dashboard Section ] ---------------------
    public function dashboard()
    {
        // check if user logged in

        if (Auth::check()) {
            return view('admins.home.index');
        }

        return redirect::to("login")->withError('Oopps! You do not have access');
    }


    // ------------------- [ User logout function ] ----------------------
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect('login');
    }
}
