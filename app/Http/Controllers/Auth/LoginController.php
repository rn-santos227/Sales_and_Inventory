<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\AuditTrail;

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
<<<<<<< HEAD
    //protected $redirectTo = '/dashboard';
=======
    protected $redirectTo = '/';
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    

    public function redirectTo()
    {
<<<<<<< HEAD
        return '/dashboard';
=======
        if (Auth::user()->user_level == 'Administrator') {
            return '/dashboard';
        }
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

    }

<<<<<<< HEAD
    protected function credentials(\Illuminate\Http\Request $request)
    {
        //return $request->only($this->username(), 'password');
        return ['username' => $request->username, 'password' => $request->password, 'active' => 1];
=======
        else {
            return '/dashboard';
        }
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    }

    /**
     * Determine if the user has too many failed login attempts.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
}
