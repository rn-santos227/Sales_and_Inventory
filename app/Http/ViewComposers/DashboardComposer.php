<?php

namespace App\Http\ViewComposers;

use App\SystemSetting;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Carbon\Carbon;
use App\Receipt;
use DB;

class DashboardComposer {
	public function create(View $view) {		
        $system_mode = SystemSetting::all()->first()->system_mode;
        
        if($system_mode == 'Restaurant')
        {
            $mode = 'restaurant';
        }

        elseif($system_mode == 'FastFood')
        {
            $mode = 'fastfood';
        }

        else
        {
            $mode = 'retailer';
        }

        $total_sales = DB::raw('SUM(receipts.total) as totalSales');

        //Getting date of every day on current week.
        $monday = Carbon::now()->startOfWeek();
        $tuesday = $monday->copy()->addDay();
        $wednesday = $tuesday->copy()->addDay();
        $thursday = $wednesday->copy()->addDay();
        $friday = $thursday->copy()->addDay();
        $saturday = $friday->copy()->addDay();
        $sunday = $saturday->copy()->addDay();

        //Daily Sale Queries
        $mondaysales = DB::table('receipts')
                ->whereDate('created_at', $monday)
                ->where('status', 'paid')
                ->where('mode', $mode)
                ->select($total_sales)
                ->pluck('totalSales')
                ->first();

        $tuesdaysales = DB::table('receipts')
                ->whereDate('created_at', $tuesday)
                ->where('status', 'paid')
                ->where('mode', $mode)
                ->select($total_sales)
                ->pluck('totalSales')
                ->first();

        $wednesdaysales = DB::table('receipts')
                ->whereDate('created_at', $wednesday)
                ->where('status', 'paid')
                ->where('mode', $mode)
                ->select($total_sales)
                ->pluck('totalSales')
                ->first();
        
        $thursdaysales = DB::table('receipts')
                ->whereDate('created_at', $thursday)
                ->where('status', 'paid')
                ->where('mode', $mode)
                ->select($total_sales)
                ->pluck('totalSales')
                ->first();
        
        $fridaysales = DB::table('receipts')
                ->whereDate('created_at', $friday)
                ->where('status', 'paid')
                ->where('mode', $mode)
                ->select($total_sales)
                ->pluck('totalSales')
                ->first();
        
        $saturdaysales = DB::table('receipts')
                ->whereDate('created_at', $saturday)
                ->where('status', 'paid')
                ->where('mode', $mode)
                ->select($total_sales)
                ->pluck('totalSales')
                ->first();
        
        $sundaysales = DB::table('receipts')
                ->whereDate('created_at', $sunday)
                ->where('status', 'paid')
                ->where('mode', $mode)
                ->select($total_sales)
                ->pluck('totalSales')
                ->first();

        $view->with('mondaysales', $mondaysales);
        $view->with('tuesdaysales', $tuesdaysales);
        $view->with('wednesdaysales', $wednesdaysales);
        $view->with('thursdaysales', $thursdaysales);
        $view->with('fridaysales', $fridaysales);
        $view->with('saturdaysales', $saturdaysales);
        $view->with('sundaysales', $sundaysales);
	}
}