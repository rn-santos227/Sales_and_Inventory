<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use App\Customer;
<<<<<<< HEAD
use App\Company;
use App\AuditTrail;
use Carbon;
use DB;
use PDF;
=======
use Carbon;
use DB;
use PDF;
use App\AuditTrail;
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
use Auth;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function batch(Request $request) {
        $success = true;
        $error_message = '';
        $v = Validator::make($request->all(), [
            'excel' => 'required:mimes:xls,xlsx',
        ]);

        if ($v->fails()) {
            $success = false;
            return response()->json(['success'=>$success,'errors'=>$v->errors()]);
        } else {
            $path = $request->file('excel')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            try {
                if(!empty($data) && $data->count()) {
                    foreach ($data as $key => $value) {
                        Customer::create([
                            'name' => $value->name,
                            'email' => $value->email,
                            'contact' => $value->contact,
                            'address' => $value->address,
                        ]);
                    }
                }                
            } catch (Illuminate\Database\QueryException $e) {
                $success = false;
                $error_message = 'Error 500: Encountered an Error during the Proccess.';
            } catch (PDOException $e) {
                $success = false;
                $error_message = 'Error 500: Encountered an Error during the Proccess.';
            }   

            $customers = $this->paginate(Customer::orderBy('created_at', 'DESC')->get())->setPath('customers');
            return Response::json(['success'=>$success,'customers'=>$customers, 'error_message'=> $error_message]);
        }
    }
=======

>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    public function pdfview(Request $request)
    {
        //gets all data from table
        $customers = DB::table("customers")->get();
        view()->share('customers',$customers);
<<<<<<< HEAD
        view()->share('company', Company::all()->first());
=======

>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        //downloads pdf from view
        if($request->has('download')){
            $pdf = PDF::loadView('customers.pdf');
        // inserts into AuditTrail
        AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Customer',
                            'activity' => 'Downloaded ' . 'Customers List', 
                            ]);
            return $pdf->download('Customers-'.Carbon\Carbon::now().'.pdf');
        }
        return view('customers.pdf');
    }

    public function index(Request $request)
    {
        //search
        if($request->has('search') && Schema::hasColumn('costumers', $request->input('tags'))) {
            $customers = Customer::where($request->input('tag'), 'LIKE', '%'. $request->input('search') . '%')->paginate(5);
        }
        else {
            $customers = Customer::paginate(5);
        }

        return view('customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //inserts into database
        $v = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:customers',
            'email' => 'required|email|string|max:255',
            'contact' => 'string|max:255',
            'address' => 'string|max:255',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        }


        //inserts into table
        Customer::create($request->all());
        AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Customers',
                            'activity' => 'Created ' . 'Customer ' . $request->name, 
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //checks if id is existing
        $customers = Customer::findOrFail($id);
        // updates table
        $customers->update($request->all());
        AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Customers',
                            'activity' => 'Updated ' . 'Customer ' . $request->name, 
        ]);  
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
