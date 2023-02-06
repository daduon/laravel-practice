<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function getUser($id){
        $user = User::find($id);
        return view('users.index',compact('user'));
    }

    public function getOrder($id){
        $user = User::find($id);
        $data = $user->orders()->get();
        dd($data);
        return view('users.order',compact('data'));
    }

    public function updateAccount(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'string',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        $user->update($data);
        return back()->with('success', 'Account updated successfully.');
    }









    // public function register()
    // {
    //   return view('auth.register');
    // }

    // public function storeUser(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:8|confirmed',
    //         'password_confirmation' => 'required',
    //     ]);

    //     User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);
    //     return redirect('home');
    // }

    // public function login()
    // {
    //   return view('auth.login');
    // }

    // public function authenticate(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|string|email',
    //         'password' => 'required|string',
    //     ]);

    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         return redirect()->intended('home');
    //     }

    //     return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');
    // }

    // public function logout() 
    // {
    //     Auth::logout();
    //     return redirect('login');
    // }

    // public function home()
    // {
    //     if(Auth::check()){
    //         return view('home');
    //     }
    //     return view('auth.login');
    // }
}
