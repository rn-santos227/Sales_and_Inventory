<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AuditTrail;
use App\Order;
use App\SystemSetting;
use Carbon\Carbon;
use DB;
use PDF;
use Auth;

class GrossProfitReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
<<<<<<< HEAD
    public function pdfview(Request $request)
    {
        
    }
=======

>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    public function index()
    {
        //Raw MySQL Queries for Sales
        $total_sales = DB::raw('SUM(receipts.total) as totalSales');
        $year_receipt_created = DB::raw('YEAR(receipts.created_at) as year');

        //Raw MyQSL Queries for Cost of Goods Sold
<<<<<<< HEAD
        $total_cost = DB::raw('(SUM(qty * cost)) as totalCosts');
=======
        $total_cost = DB::raw('(SUM(qty * cost)) as totalCost');
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        $year_sold = DB::raw('YEAR(created_at) as year');

        //Gross Profit for Retailer
        if(SystemSetting::first()->system_mode == 'Retailer')
        {
            $sales = DB::table('receipts')
<<<<<<< HEAD
                ->where('status', 'paid')
=======
                ->where('status', 'served')
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                ->where('mode', 'retailer')
                ->select($total_sales, $year_receipt_created)
                ->groupBy('year')
                ->get();

            $costs = DB::table('purchases')
<<<<<<< HEAD
                ->where('status', 'paid')
=======
                ->where('status', 'served')
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                ->select($total_cost, $year_sold)
                ->groupBy('year')
                ->get();

            $gross_profit = 0;
<<<<<<< HEAD
        }

        //Gross Profit for Restaurant
        else if(SystemSetting::first()->system_mode == 'Restaurant')
        {
            $sales = DB::table('receipts')
                ->where('status', 'paid')
                ->where('mode', 'restaurant')
                ->select($total_sales, $year_receipt_created)
                ->groupBy('year')
                ->get();

            $costs = DB::table('orders')
                ->where('status', 'served')
                ->select($total_cost, $year_sold)
                ->groupBy('year')
                ->get();

            $gross_profit = 0;
        }

        //Gross Profit for Fastfood
        else
        {
            $sales = DB::table('receipts')
                ->where('status', 'paid')
                ->where('mode', 'fastfood')
                ->select($total_sales, $year_receipt_created)
                ->groupBy('year')
                ->limit(1)
=======

            foreach ($sales as $sale) 
            {
                $gross_profit += $sale->totalSales;
            }

            foreach ($costs as $cost) 
            {
                $gross_profit -= $cost->totalCost;
            }
        }

        //Gross Profit for Restaurant
        else
        {
            $sales = DB::table('receipts')
                ->where('status', 'served')
                ->where('mode', 'restaurant')
                ->select($total_sales, $year_receipt_created)
                ->groupBy('year')
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                ->get();

            $costs = DB::table('orders')
                ->where('status', 'served')
                ->select($total_cost, $year_sold)
                ->groupBy('year')
<<<<<<< HEAD
                ->limit(1)
                ->get();

            $gross_profit = 0;
        }

        $totalSales = 0;
        $totalCosts = 0;

        //Computation for Gross Profit
        foreach ($sales as $sale) 
        {
            $gross_profit += $sale->totalSales;
        }

        foreach ($costs as $cost) 
        {
            $gross_profit -= $cost->totalCosts;
        }

        //Computation for Total Sales
        foreach ($sales as $sale)
        {
            $totalSales = $sale->totalSales;
        }

        //Computation for Total Costs
        foreach ($costs as $cost)
        {
            $totalCosts = $cost->totalCosts;
        }


        return view('salesreports.grossprofits.index', compact('gross_profit', 'totalSales', 'totalCosts'));
=======
                ->get();

            $gross_profit = 0;

            foreach ($sales as $sale) 
            {
                $gross_profit += $sale->totalSales;
            }

            foreach ($costs as $cost) 
            {
                $gross_profit -= $cost->totalCost;
            }
        }

        return view('salesreports.grossprofits.index', compact('gross_profit', 'sales', 'costs'));
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    }

    public function create()
    {
        //
    }

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
