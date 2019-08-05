<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
<<<<<<< HEAD
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Supplier;
use App\AuditTrail;
use App\Company;
use Carbon;
use Auth;
use Response;
Use Excel;
use PDF;
use DB;
=======
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Supplier;
use App\Category;
use App\AuditTrail;
use Auth;
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3


class SupplierController extends Controller
{
    public function __construct()
<<<<<<< HEAD
    {
        $this->middleware('auth');
    }

    public function batch(Request $request) {
        $success = true;
        $show_error = false;
        $records = 0;

        $v = Validator::make($request->all(), [
            'excel' => 'required|mimes:xls,xlsx',
        ]);

        if ($v->fails()) {
            $success = false;
            return response()->json(['success'=>$success, 'error_msg' => $show_error, 'errors'=>$v->errors()->get('excel')]);
        } else {
            $path = $request->file('excel')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();

            if(!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {
                    try {
                        Supplier::create([
                            'name' => $value->name,
                            'ref_code' => $value->ref_code,
                            'email' => $value->email,
                            'address' => $value->address,
                            'contact' => $value->contact,
                            'description' => $value->description,
                        ]);
                        $records++;
                    } 

                    catch (\Exception $ex) {
                        continue;
                    }
                }
            }                

            $suppliers = $this->paginate(Supplier::orderBy('created_at', 'DESC')->get())->setPath('suppliers');
            return Response::json(['success'=>$success,'suppliers'=>$suppliers, 'records'=>$records]);
        }
    } 

    protected function paginate($suppliers, $perPage = 5)
    {
        //Get current page form url e.g. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //Slice the collection to get the suppliers to display in current page
        $currentPagesuppliers = $suppliers->slice(($currentPage - 1) * $perPage, $perPage);

        //Create our paginator and pass it to the view
        return new LengthAwarePaginator($currentPagesuppliers, count($suppliers), $perPage);
    }

    public function index(Request $request)
    {
        //Index function
        $suppliers = $this->paginate(Supplier::orderBy('created_at', 'DESC')->get())->setPath('suppliers');
        if ($request->ajax()) {
            return view('suppliers.data', compact('suppliers'));
        }
        return view('suppliers.index', compact('suppliers'));
    }
    public function pdfview(Request $request)
    {
        $suppliers = DB::table("suppliers")->get();
        view()->share('suppliers',$suppliers);
        view()->share('company', Company::all()->first());
        
        if($request->has('download')){

            $pdf = PDF::loadView('suppliers.pdf');
            return $pdf->download('Suppliers-'.Carbon\Carbon::now().'.pdf');
        }
        return view('suppliers.pdf');

    }
    public function search(Request $request) 
    {
        $suppliers;
        if($request->has('search') && Schema::hasColumn('suppliers', $request->tags)) {
            $suppliers = $this->paginate(Supplier::orderBy('created_at', 'DESC')->where($request->tags, 'LIKE', '%'. $request->search . '%')->get())->setPath('suppliers');
        }
        else{
            $suppliers = $this->paginate(Supplier::orderBy('created_at', 'DESC')->get())->setPath('suppliers');
        }

        if ($request->ajax()) {
             return Response::json(['success'=>true,'suppliers'=>$suppliers]);
        }
        return Response::json(['success'=>true,'suppliers'=>$suppliers]);
    }

    public function view(Request $request) 
    {
        $supplier = Supplier::findOrFail($request->id);
        return Response::json(['success'=>true,'supplier'=>$supplier]);
=======
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request->has('search') && Schema::hasColumn('suppliers', $request->input('tags'))) {
            $suppliers = Supplier::where($request->input('tag'), 'LIKE', '%'. $request->input('search') . '%')->paginate(5);
        }
        else{
            $suppliers = Supplier::paginate(5);
        }
        //returns suppliers blade and imports suppliers into blade
        return view('suppliers.index',compact('suppliers'));
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //returns suppliers blade
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validates all input 
        $v = Validator::make($request->all(), [
            'ref_code' => 'required|string|max:255|unique:suppliers',
            'name' => 'required|string|max:255',
            'email' => 'string|email|max:255|unique:suppliers',
            'address' => 'string|max:255',
            'contact' => 'string|max:255',
<<<<<<< HEAD
=======
            'description' => 'string|max:255',
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        ]);

        // if ($v->fails()) {
        //     return redirect()->back()->withErrors($v->errors());
        // }
        //stores info into suppliers table
<<<<<<< HEAD
        if ($v->fails()) {
             return response()->json(['success'=>false,'errors'=>$v->errors()]);
        } 
        else {
            $suppliers = Supplier::create($request->all());
            AuditTrail::create(['user_id' => Auth::user()->id,
                                'username' => Auth::user()->username,
                                'form_name' => 'Suppliers',
                                'activity' => 'Created ' . 'Supplier ' . $request->name, 
            ]);
            return Response::json(['success'=>true,'suppliers'=>$suppliers]);
        }      
=======
        Supplier::create($request->all());
        AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Suppliers',
                            'activity' => 'Created ' . 'Supplier ' . $request->name, 
        ]);
        return redirect()->back();
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
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
<<<<<<< HEAD
        // validates all input 
        $v = Validator::make($request->all(), [
            'ref_code' => 'required|string|max:255|unique:suppliers',
            'name' => 'required|string|max:255',
            'email' => 'string|email|max:255|unique:suppliers',
            'address' => 'string|max:255',
            'contact' => 'string|max:255',
        ]);

        // if ($v->fails()) {
        //     return redirect()->back()->withErrors($v->errors());
        // }
        //stores info into suppliers table
        if ($v->fails()) {
             return response()->json(['success'=>false,'errors'=>$v->errors()]);
        } 
        else {
            //checks if Supplier model exists
            $suppliers = Supplier::findOrFail($id);
            //updates the suppliers table
            $suppliers->update($request->all());  
            AuditTrail::create(['user_id' => Auth::user()->id,
                                'username' => Auth::user()->username,
                                'form_name' => 'Suppliers',
                                'activity' => 'Updated ' . 'Supplier ' . $request->name, 
            ]);
            return Response::json(['success'=>true,'suppliers'=>$suppliers]);
        }  
=======
        //checks if Supplier model exists
        $suppliers = Supplier::findOrFail($id);
        //updates the suppliers table
        $suppliers->update($request->all());  
        AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Suppliers',
                            'activity' => 'Updated ' . 'Supplier ' . $request->name, 
        ]);
        return redirect()->back();
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
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