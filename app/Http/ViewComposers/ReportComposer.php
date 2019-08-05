<?php

namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\SystemSetting;
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
use Illuminate\View\View;
use Carbon\Carbon;

class ReportComposer {
	public function create(View $view) {
		$currentdate = Carbon::today();

<<<<<<< HEAD
        
        if(SystemSetting::first()->system_mode == 'Retailer')
        {
            // gets transactions for today
            $transactions = DB::table('receipts')
                ->whereDate('created_at','=', $currentdate)
                ->where('status','=', 'paid')
                ->where('mode','=', 'retailer')
                ->orderBy('created_at','asc')
                ->select(DB::raw('count(ID) as trans'))
                ->first();

            // gets total sales for today
            $totalsales = DB::table('receipts')
                ->whereDate('created_at','=', $currentdate)
                ->where('status','=', 'paid')
                ->where('mode','=', 'retailer')
                ->orderBy('created_at','asc')
                ->select(DB::raw('SUM(amount_due) as sales'))
                ->first();

            // gets total profit for today
            $totalprofit = DB::table('purchases')
                ->whereDate('created_at','=', $currentdate)
                ->where('status','=', 'paid')
                ->orderBy('created_at','asc')
                ->select(DB::raw('(SUM(price * qty)) - (SUM(qty * cost)) as profit'))
                ->first();
        }

        else
        {
            // gets transactions for today
            $transactions = DB::table('receipts')
                ->whereDate('created_at','=', $currentdate)
                ->where('status','=', 'paid')
                ->where('mode','<>', 'retailer')
                ->orderBy('created_at','asc')
                ->select(DB::raw('count(ID) as trans'))
                ->first();

            // gets total sales for today
            $totalsales = DB::table('receipts')
                ->whereDate('created_at','=', $currentdate)
                ->where('status','=', 'paid')
                ->where('mode','<>', 'retailer')
                ->orderBy('created_at','asc')
                ->select(DB::raw('SUM(amount_due) as sales'))
                ->first();

            // gets total profit for today
            $totalprofit = DB::table('orders')
                ->whereDate('created_at','=', $currentdate)
                ->where('status', 'served')
                ->select(DB::raw('(SUM(price * qty)) - (SUM(qty * cost)) as profit'))
                ->first();
        }
        

        // //gets all orders for today
        // $solditems =  DB::table('orders')
        //     ->where('status', 'served')
        //     ->select('orders.*', DB::raw('SUM(subtotal) as subtotal'), DB::raw('SUM(qty) as qty'))
        //     ->whereDate('created_at','=', $currentdate)
        //     ->groupBy('ref_code')
        //     ->orderBy('qty', 'dsc')
        //     ->orderBy('subtotal', 'dsc')
        //     ->limit(3)
        //     ->get();

        // //gets all items
        $products = DB::table('inventory')
            ->whereColumn('quantity', '<=', 'reorder_point')
            ->orderBy('quantity', 'asc')
=======
        // gets total sales for today
        $totalsales = DB::table('receipts')
            ->whereDate('created_at','=', $currentdate)
            ->where('status','=', 'served')
            ->orderBy('created_at','asc')
            ->select(DB::raw('SUM(amount_due) as sales'))
            ->first();

        // gets transactions for today
        $transactions = DB::table('receipts')
            ->whereDate('created_at','=', $currentdate)
            ->where('status','=', 'served')
            ->orderBy('created_at','asc')
            ->select(DB::raw('count(ID) as trans'))
            ->first();
        
        //gets all orders for today
        $solditems =  DB::table('orders')
            ->where('status', 'served')
            ->select('orders.*', DB::raw('SUM(subtotal) as subtotal'), DB::raw('SUM(qty) as qty'))
            ->whereDate('created_at','=', $currentdate)
            ->groupBy('ref_code')
            ->orderBy('qty', 'dsc')
            ->orderBy('subtotal', 'dsc')
            ->limit(3)
            ->get();

        //gets all items
        $products = DB::table('items')
            ->orderBy('quantity', 'asc')
            ->limit(3)
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
            ->get();

         
        $view->with('currentdate', $currentdate);
        $view->with('totalsales', $totalsales);
<<<<<<< HEAD
        $view->with('totalprofit', $totalprofit);
        $view->with('transactions', $transactions);
        // $view->with('solditems', $solditems);
=======
        $view->with('transactions', $transactions);
        $view->with('solditems', $solditems);
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        $view->with('products', $products);
	}
}