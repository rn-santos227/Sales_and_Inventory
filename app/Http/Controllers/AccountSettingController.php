<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
<<<<<<< HEAD
use App\AuditTrail;
use Auth;
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

class AccountSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $account = User::all();
        return view('accountsettings.index', compact('account'));
    }

    public function create()
    {
        // creates validator
        return User::create([
            'user_level' => $data['user_level'],
            'username' => $data['username'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //Links $account variable to User table
        $account = User::findOrFail($id);

        //Update using Eloquent
        $account->update($request->all());  

<<<<<<< HEAD
        AuditTrail::create([
                            'user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Account Settings',
                            'activity' => 'Updated ' . 'Account', 
                        ]);
        return redirect('/accountsettings');

=======
        return redirect('/accountsettings');
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    }

    public function destroy($id)
    {
        //
    }

    protected function validator(array $data)
    {   
        // uses validator
        return Validator::make($data, [
            'user_level' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
}
