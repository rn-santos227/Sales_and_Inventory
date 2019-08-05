<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Employee;
use App\AuditTrail;
use App\Company;
use App\SystemSetting;
use Carbon;
use Image;
use PDF;
use DB;
use Auth;
use Response;
use Excel;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pdfview(Request $request)
    {
        $employees = DB::table("employees")->get();
        view()->share('employees',$employees);
        view()->share('company', Company::all()->first());
        
        if($request->has('download')){

            $pdf = PDF::loadView('employees.pdf');
            return $pdf->download('Employees-'.Carbon\Carbon::now().'.pdf');
        }
        return view('employees.pdf');

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
                        Employee::create([
                            'first_name' => $value->first_name,
                            'last_name' => $value->last_name,
                            'designation' => $value->designation,
                            'description' => $value->description,
                            'active' => 1,
                        ]);
                        $records++;
                    } 

                    catch (\Exception $ex) {
                        continue;
                    } 
                }              
            } 

            $employees = $this->paginate(Employee::orderBy('created_at', 'DESC')->get())->setPath('employees');
            return Response::json(['success'=>$success,'employees'=>$employees, 'records'=>$records]);
        }
    } 

    protected function paginate($employees, $perPage = 5)
    {
        //Get current page form url e.g. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //Slice the collection to get the employees to display in current page
        $currentPageEmployees = $employees->slice(($currentPage - 1) * $perPage, $perPage);

        //Create our paginator and pass it to the view
        return new LengthAwarePaginator($currentPageEmployees, count($employees), $perPage);
    }

    public function index(Request $request)
    {
        if(SystemSetting::first()->system_mode == 'Restaurant') { 
        //Index function
            $employees = Employee::paginate(5);
            if ($request->ajax()) {
                return view('employees.data', compact('employees'));
            }
            return view('employees.index', compact('employees'));
        } else {
            return redirect()->back();            
        }
    }

    public function search(Request $request)
    {

        $employees;
        if($request->has('search') && Schema::hasColumn('employees', $request->tags)) {
            $employees = $this->paginate(Employee::orderBy('created_at', 'DESC')->where($request->tags, 'LIKE', '%'. $request->search . '%')->get())->setPath('employees');
        }
        else{
            $employees = $this->paginate(Employee::orderBy('created_at', 'DESC')->get())->setPath('employees');
        }

        if ($request->ajax()) {
             return Response::json(['success'=>true,'employees'=>$employees]);
        }
        return Response::json(['success'=>true,'employees'=>$employees]);
    }

    public function view(Request $request)
    {

        $employee = Employee::findOrFail($request->id);
        return Response::json(['success'=>true,'employee'=>$employee]);
    }    

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $fname = '';
        $v = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
        ]);

        if ($v->fails()) {     
            return response()->json(['success'=>false,'errors'=>$v->errors()]);
        }

        else {
            $employee = Employee::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'designation' => $request->designation,
                'description' => $request->description,
                'active' => $request->active,
            ]);

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = $employee->id . '.' . $file->getClientOriginalExtension();
                $file = $file->move(public_path().'/images/'.'/employees/', $filename);
                Image::make($file->getRealPath())->resize(150, 150)->save();
                $fname = $filename;
            }

            $employee->image = $fname;
            $employee->save();

            AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Employees',
                            'activity' => 'Updated ' . 'employee ' . $request->name, 
            ]);
            return Response::json(['success'=>true,'employee'=>$employee]);
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fname = '';
        $v = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'active' => 'required',
        ]);

        if ($v->fails()) {
            return response()->json(['success'=>false,'errors'=>$v->errors()]);
        }  else {
            $employee=Employee::findOrFail($id);
            $employee->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'image' => $fname ,
                'designation' => $request->designation,
                'description' => $request->description,
                'active' => $request->active,
            ]); 

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = $request->ref_code . '.' . $file->getClientOriginalExtension();
                $file = $file->move(public_path().'/images/'.'/employees/', $filename);
                Image::make($file->getRealPath())->resize(150, 150)->save();
                $fname = $filename;
            } else {
                $fname = $employee->getImageFile();
            }

            $employee->image = $fname;
            $employee->save();            

            AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'employee',
                            'activity' => 'Updated ' . 'Item ' . $request->name, 
            ]);
            return Response::json(['success'=>true,'employees'=>$employees]);  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
