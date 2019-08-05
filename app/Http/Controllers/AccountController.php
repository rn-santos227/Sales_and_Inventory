<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\AuditTrail;
<<<<<<< HEAD
use App\Company;
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
use DB;
use Auth;
use PDF;
use Carbon;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pdfview(Request $request)
    {
        //gets all users 
        $accounts = DB::table("users")->get();
        view()->share('accounts',$accounts);
<<<<<<< HEAD
        view()->share('company', Company::all()->first());
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

        // downloads generated pdf
        if($request->has('download')){

            $pdf = PDF::loadView('accounts.pdf');

            //insert into auditrail
            AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Account',
                            'activity' => 'Downloaded ' . 'Account List', 
            ]);
            return $pdf->download('Account-'.Carbon\Carbon::now().'.pdf');
        }
        return view('accounts.pdf');

    }

    public function index()
    {
        $accounts = User::paginate(5);

        //returns to index with $accounts data
        return view('accounts.index', compact('accounts'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //Validates the input's format/type
        $v = Validator::make($request->all(), [
            'user_level' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        }
<<<<<<< HEAD
        else {
            //Insertion to database using Eloquent
            User::create($request->all());

            AuditTrail::create(['user_id' => Auth::user()->id,
                                'username' => Auth::user()->username,
                                'form_name' => 'Account',
                                'activity' => 'Created ' . 'Account ' . $request->username, 
            ]);

            return redirect()->back();            
        }


=======

        //Insertion to database using Eloquent
        User::create($request->all());

        AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Account',
                            'activity' => 'Created ' . 'Account ' . $request->username, 
        ]);

        return redirect()->back();
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
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
<<<<<<< HEAD
        //Validates the input's format/type
        $v = Validator::make($request->all(), [
            'user_level' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        }


        //Insertion to database using Eloquent
        $user = User::findOrFail($id);
        $user->update($request->all());  

        AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Account',
                            'activity' => 'Created ' . 'Account ' . $request->username, 
        ]);

        return redirect()->back();
=======
        //
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    }

    public function destroy($id)
    {
        //
    }

    public function block(Request $request)
    {
        //Updates active attribute of table user using QueryBuilder. Where condition is linked by $request->id. $request is a predefined variable by Laravel. ->id represents the name property of a tag. (name="id")
        DB::table('users')
            ->where('id', $request->id)
            ->update([
                'active' => '0',
            ]); 

        AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Account',
                            'activity' => 'Locked ' . 'Account ' . $request->username, 
        ]);

        return redirect()->back();
    }

    public function unblock(Request $request)
    {
        //Updates active attribute of table user using QueryBuilder
        DB::table('users')
            ->where('id', $request->id)
            ->update([
                'active' => '1',
            ]);

        //insert into auditrail
        AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Account',
                            'activity' => 'Unlocked ' . 'Account ' . $request->username, 
        ]);

        return redirect()->back();
    }
}
