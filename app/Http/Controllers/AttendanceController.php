<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Response;
use App\AuditTrail;
use Auth;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	$employees = Employee::whereActive(1)->get();

        return view('attendance.index', compact('employees'));
    }


    // sets employee status if present or not
    public function call(Request $request)
    {
        
        $employee = Employee::findOrFail($request->employee_id);
        $employee->update([
            'present' => $request->value,
        ]);

        if($request->value == 1){
            $pres = 'Active';
        }
        else {
            $pres = 'Inactive';   
        }
        AuditTrail::create([
                            'user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Employee Attendance',
                            'activity' => 'Employee is ' . $pres , 
                        ]);


        return Response::json(['success'=>true]);
        return redirect()->back();   
    }
}
