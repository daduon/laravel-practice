<?php

namespace App\Http\Controllers\Admins\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = 'admin/home';



    public function showLoginForm()
    {
        return view('admins.auth.login');
    }


    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    protected function credentials(Request $request)
    {
        $admin = Admin::where('email',$request->email)->first();

        if (count(array($admin))) {
            if($admin == null){
                return ['email'=>'inactive','password'=>'You are not an active person, please contact Admin'];
            }
            if ($admin->status != 1) {
                return ['email'=>'inactive','password'=>'You are not an active person, please contact Admin'];
            }else{
                return ['email'=>$request->email,'password'=>$request->password,'status'=>1];
            }
        }
        return $request->only($this->username(), 'password');
    }

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
    
}
