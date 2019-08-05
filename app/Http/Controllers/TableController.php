<?php

namespace App\Http\Controllers;

use App\Table;
use App\AuditTrail;
use App\SystemSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Company;
use Carbon;
use PDF;
use Response;
use Auth;
use Excel;



class TableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function pdfview(Request $request)
    {
        $items = DB::table("tables")->get();
        view()->share('items',$items);
        view()->share('company', Company::all()->first());
        
        if($request->has('download')){

            $pdf = PDF::loadView('tables.pdf');
            return $pdf->download('Tables-'.Carbon\Carbon::now().'.pdf');
        }
        return view('tables.pdf');

    }
    public function batch(Request $request) {
        $success = true;
        $show_error = false;
        $error_message = '';
        $reports = 0;

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
                try {
                    foreach ($data as $key => $value) {
                        Table::create([
                            'name' => $value->name,
                            'ref_code' => $value->ref_code,
                            'description' => $value->description,
                        ]);
                        $reports++;
                    }
                }

                catch (\Exception $ex) {
                    // continue;
                }
            }   

            $tables = $this->paginate(Table::orderBy('created_at', 'DESC')->get())->setPath('tables');
            return Response::json(['success'=>$success,'tables'=>$tables, 'records'=>$records]);
        }
    }
    protected function paginate($tables, $perPage = 5)
    {
        //Get current page form url e.g. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //Slice the collection to get the tables to display in current page
        $currentPagetables = $tables->slice(($currentPage - 1) * $perPage, $perPage);

        //Create our paginator and pass it to the view
        return new LengthAwarePaginator($currentPagetables, count($tables), $perPage);
    }

    public function index(Request $request)
    {

        if(SystemSetting::first()->system_mode == 'Restaurant') {

            $tables = $this->paginate(Table::orderBy('created_at', 'DESC')->get())->setPath('tables');
            if ($request->ajax()) {
                return view('tables.data', compact('tables'));
            }
            return view('tables.index', compact('tables'));
        }

        else {
            return redirect()->back();
        }
    }

    public function search(Request $request)
    {
        $tables;
        if($request->has('search') && Schema::hasColumn('tables', $request->tags)) {
            $tables = $this->paginate(Table::orderBy('created_at', 'DESC')->where($request->tags, 'LIKE', '%'. $request->search . '%')->get())->setPath('tables');
        }
        else{
            $tables = $this->paginate(Table::orderBy('created_at', 'DESC')->get())->setPath('tables');
        }

        if ($request->ajax()) {
             return Response::json(['success'=>true,'tables'=>$tables]);
        }
        return Response::json(['success'=>true,'tables'=>$tables]);        
    }

    public function view(Request $request)
    {
        $table = Table::findOrFail($request->id);
        return Response::json(['success'=>true,'table'=>$table]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'ref_code' => 'required|string|max:255|unique:tables',
            'name' => 'required|string|max:255',
        ]);

        if ($v->fails()) {
             return response()->json(['success'=>false,'errors'=>$v->errors()]);
        } 
        else {
            $tables = Table::create($request->all());
            AuditTrail::create(['user_id' => Auth::user()->id,
                                'username' => Auth::user()->username,
                                'form_name' => 'Table',
                                'activity' => 'Created ' . 'Table ' . $request->name, 
            ]);
            return Response::json(['success'=>true,'tables'=>$tables]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $v = Validator::make($request->all(), [
            'ref_code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);

        if ($v->fails()) {
             return response()->json(['success'=>false,'errors'=>$v->errors()]);
        }

        else {
            $tables = Table::findOrFail($id);
            $tables->update($request->all());  
            AuditTrail::create(['user_id' => Auth::user()->id,
                                'username' => Auth::user()->username,
                                'form_name' => 'Table',
                                'activity' => 'Updated ' . 'Table ' . $request->name, 
            ]);
            return Response::json(['success'=>true, 'tables'=>$tables]);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        //
    }
}
