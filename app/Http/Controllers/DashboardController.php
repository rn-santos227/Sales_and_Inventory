<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Receipt;
<<<<<<< HEAD
use App\SystemSetting;
use Auth;
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
use DB;

class DashboardController extends Controller
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
    public function index()
<<<<<<< HEAD
    {   

        // $system_mode = SystemSetting::all()->first()->system_mode;
        
        // if($system_mode == 'Restaurant')
        // {
        //     $mode = 'restaurant';
        // }

        // elseif($system_mode == 'FastFood')
        // {
        //     $mode = 'fastfood';
        // }

        // else
        // {
        //     $mode = 'retailer';
        // }

        // $total_sales = DB::raw('SUM(receipts.total) as totalSales');

        // //Getting date of every day on current week.
        // $monday = Carbon::now()->startOfWeek();
        // $tuesday = $monday->copy()->addDay();
        // $wednesday = $tuesday->copy()->addDay();
        // $thursday = $wednesday->copy()->addDay();
        // $friday = $thursday->copy()->addDay();
        // $saturday = $friday->copy()->addDay();
        // $sunday = $saturday->copy()->addDay();

        // //Daily Sale Queries
        // $mondaysales = DB::table('receipts')
        //         ->whereDate('created_at', $monday)
        //         ->where('status', 'paid')
        //         ->where('mode', $mode)
        //         ->select($total_sales)
        //         ->pluck('totalSales')
        //         ->first();

        // $tuesdaysales = DB::table('receipts')
        //         ->whereDate('created_at', $tuesday)
        //         ->where('status', 'paid')
        //         ->where('mode', $mode)
        //         ->select($total_sales)
        //         ->pluck('totalSales')
        //         ->first();

        // $wednesdaysales = DB::table('receipts')
        //         ->whereDate('created_at', $wednesday)
        //         ->where('status', 'paid')
        //         ->where('mode', $mode)
        //         ->select($total_sales)
        //         ->pluck('totalSales')
        //         ->first();
        
        // $thursdaysales = DB::table('receipts')
        //         ->whereDate('created_at', $thursday)
        //         ->where('status', 'paid')
        //         ->where('mode', $mode)
        //         ->select($total_sales)
        //         ->pluck('totalSales')
        //         ->first();
        
        // $fridaysales = DB::table('receipts')
        //         ->whereDate('created_at', $friday)
        //         ->where('status', 'paid')
        //         ->where('mode', $mode)
        //         ->select($total_sales)
        //         ->pluck('totalSales')
        //         ->first();
        
        // $saturdaysales = DB::table('receipts')
        //         ->whereDate('created_at', $saturday)
        //         ->where('status', 'paid')
        //         ->where('mode', $mode)
        //         ->select($total_sales)
        //         ->pluck('totalSales')
        //         ->first();
        
        // $sundaysales = DB::table('receipts')
        //         ->whereDate('created_at', $sunday)
        //         ->where('status', 'paid')
        //         ->where('mode', $mode)
        //         ->select($total_sales)
        //         ->pluck('totalSales')
        //         ->first();

        // $totalsales = $mondaysales + $tuesdaysales + $wednesdaysales + $thursdaysales + $fridaysales + $saturdaysales + $sundaysales;

=======
    {
        //inserts data into view
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        return view('dashboard.index');
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
        //
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
        //
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
