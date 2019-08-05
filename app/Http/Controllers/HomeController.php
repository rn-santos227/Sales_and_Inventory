<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SystemSetting;
use Auth;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD

        // if(Auth::user()->user_level === 'Administrator')
        // {
        //     return view('dashboard.index');
        // }

        // elseif(Auth::user()->user_level === 'Administrator')
        // {
        //     return view('user.home');
        // }

        // elseif(Auth::user()->user_level === 'Kitchen')
        // {
        //     return 'asdasd';
        // }

        // else
        // {
        //     return 'dsadsa';
        //     return view('auth.login');
        // }
=======

        if(Auth::user()->user_level === 'Administrator')
        {
            return view('dashboard.index');
        }

        return view('user.home');

        
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    }
}
