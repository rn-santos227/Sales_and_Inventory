<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\SystemSetting;
<<<<<<< HEAD
use App\Company;
use PDF;
=======
use App\Receipt;
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
use Carbon\Carbon;

class SalesAnalysisReportController extends Controller
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
    public function pdfview(Request $request)
    {
        // $datefromSession = $request->session()->get('datefrom', 'default');
        // $datetoSession = $request->session()->get('dateto', 'default');
        // $period = $request->session()->get('period', 'default');

        // if($period == 'Daily') {
        //         $datefrom = Carbon::now()->startOfDay();
        //         $dateto = Carbon::now()->endOfDay();
        // }
        // elseif ($period == 'Weekly') {
        //     $datefrom = Carbon::now()->startOfWeek();
        //     $dateto = Carbon::now()->endOfWeek();
        // }
        // elseif ($period == 'Monthly') {
        //     $datefrom = Carbon::now()->startOfMonth();
        //     $dateto = Carbon::now()->endOfMonth();
        // }
        // elseif ($period == 'Yearly') {
        //     $datefrom = Carbon::now()->startOfYear();
        //     $dateto = Carbon::now()->endOfYear();   
        // }
        // else
        // {
        //     $datefrom =  Carbon::parse($datefromSession);
        //     $dateto = Carbon::parse($datetoSession);
        // }

        // if(SystemSetting::first()->system_mode == 'Retailer')
        // {
        //     $qty = DB::raw('SUM(purchases.qty) as qty');
        //     $total_cost = DB::raw('SUM(purchases.qty)*purchases.cost as total_cost');
        //     $gross_rev = DB::raw('(purchases.price*(SUM(purchases.qty))) as gross_rev');
        //     $profit = DB::raw('((purchases.price*(SUM(purchases.qty))) - (SUM(purchases.qty)*purchases.cost)) as profit');
        //     $percent = DB::raw('((((purchases.price*(SUM(purchases.qty)))- SUM(purchases.qty)*purchases.cost)/(purchases.price*(SUM(purchases.qty))))*100)as percent ');

        //     $salesanalysis =  DB::table('purchases')
        //         ->whereDate('purchases.created_at','>=', $datefrom)
        //         ->whereDate('purchases.created_at', '<=', $dateto)
        //         ->where('purchases.status', 'paid')
        //         ->select('purchases.ref_code', $qty,'purchases.cost', $total_cost,'purchases.price', $gross_rev, $profit, $percent)
        //         ->groupBy('purchases.ref_code')
        //         ->orderBy('purchases.qty', 'dsc')
        //         ->get(); 
        // }   
        // else
        // {
        //     $qty = DB::raw('SUM(orders.qty) as qty');
        //     $total_cost = DB::raw('SUM(orders.qty)*orders.cost as total_cost');
        //     $gross_rev = DB::raw('(orders.price*(SUM(orders.qty))) as gross_rev');
        //     $profit = DB::raw('((orders.price*(SUM(orders.qty))) - (SUM(orders.qty)*orders.cost)) as profit');
        //     $percent = DB::raw('((((orders.price*(SUM(orders.qty)))- SUM(orders.qty)*orders.cost)/(orders.price*(SUM(orders.qty))))*100)as percent ');

        //     $salesanalysis =  DB::table('orders')
        //         ->whereDate('orders.created_at','>=', $datefrom)
        //         ->whereDate('orders.created_at', '<=', $dateto)
        //         ->where('orders.status', 'w34f')
        //         ->select('orders.ref_code', $qty,'orders.cost', $total_cost,'orders.price', $gross_rev, $profit, $percent)
        //         ->groupBy('orders.ref_code')
        //         ->orderBy('orders.qty', 'dsc')
        //         ->get();    
        // }

        // $total_cost = 0;
        // $total_gross_rev = 0;
        // $total_profit = 0;
        
        // foreach ($salesanalysis as $item) 
        // {
        //     $total_cost += $item->total_cost;
        //     $total_gross_rev += $item->gross_rev;
        //     $total_profit += $item->profit;
        // }


        // view()->share('salesanalysis', $salesanalysis);
        // view()->share('datefrom', $datefrom);
        // view()->share('dateto', $dateto);
        // view()->share('period', $period);
        // view()->share('total_cost', $total_cost);
        // view()->share('total_gross_rev', $total_gross_rev);
        // view()->share('total_profit', $total_profit);

        // view()->share('company', Company::all()->first());

        // if($request->has('download')){
        //     $pdf = PDF::loadView('salesreports.salesanalysis.pdf');
        //     return $pdf->download('salesanalysis-'.Carbon::now().'.pdf');
        // }

        // return view('salesreports.salesanalysis.pdf');

        $datefromSession = $request->session()->get('datefrom', 'default');
        $datetoSession = $request->session()->get('dateto', 'default');
        $period = $request->session()->get('period', 'default');

        if(SystemSetting::first()->system_mode == 'Retailer')
        {
            if($request->period == 'Months')
            {
                $total_cost = DB::raw('SUM(qty * cost) as total_cost');
                $total_grossrev = DB::raw('(SUM(price * qty)) as total_grossrev');
                $total_profit = DB::raw('(SUM(price * qty)) - (SUM(qty * cost)) as total_profit');

                $period = DB::raw('month(created_at) as period');
                $format = 'F';

                $salesanalysis = DB::table('purchases')
                    ->whereDate('created_at','>=', $datefromSession)
                    ->whereDate('created_at', '<=', $datetoSession)
                    ->where('status', 'paid')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get();

                $salesanalysisarray = DB::table('purchases')
                    ->whereDate('created_at','>=', $datefromSession)
                    ->whereDate('created_at', '<=', $datetoSession)
                    ->where('status', 'paid')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get()
                    ->toArray();
            }

            else if($request->period == 'Years')
            {
                $total_cost = DB::raw('SUM(qty * cost) as total_cost');
                $total_grossrev = DB::raw('(SUM(price * qty)) as total_grossrev');
                $total_profit = DB::raw('(SUM(price * qty)) - (SUM(qty * cost)) as total_profit');

                $period = DB::raw('year(created_at) as period');
                $format = 'Y';

                $salesanalysis = DB::table('purchases')
                    ->whereDate('created_at','>=', $datefromSession)
                    ->whereDate('created_at', '<=', $datetoSession)
                    ->where('status', 'paid')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get();

                $salesanalysisarray = DB::table('purchases')
                    ->whereDate('created_at','>=', $datefromSession)
                    ->whereDate('created_at', '<=', $datetoSession)
                    ->where('status', 'paid')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get()
                    ->toArray();
            }

            else
            {
                $total_cost = DB::raw('SUM(qty * cost) as total_cost');
                $total_grossrev = DB::raw('(SUM(price * qty)) as total_grossrev');
                $total_profit = DB::raw('(SUM(price * qty)) - (SUM(qty * cost)) as total_profit');

                $period = DB::raw('date(created_at) as period');
                $format = 'F j, Y';

                $salesanalysis = DB::table('purchases')
                    ->whereDate('created_at','>=', $datefromSession)
                    ->whereDate('created_at', '<=', $datetoSession)
                    ->where('status', 'paid')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get();

                $salesanalysisarray = DB::table('purchases')
                    ->whereDate('created_at','>=', $datefromSession)
                    ->whereDate('created_at', '<=', $datetoSession)
                    ->where('status', 'paid')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get()
                    ->toArray();
            }
        }

        else
        {
            if($request->period == 'Months')
            {
                $total_cost = DB::raw('SUM(qty * cost) as total_cost');
                $total_grossrev = DB::raw('(SUM(price * qty)) as total_grossrev');
                $total_profit = DB::raw('(SUM(price * qty)) - (SUM(qty * cost)) as total_profit');

                $period = DB::raw('month(created_at) as period');
                $format = 'F';

                $salesanalysis = DB::table('orders')
                    ->whereDate('created_at','>=', $datefromSession)
                    ->whereDate('created_at', '<=', $datetoSession)
                    ->where('status', 'served')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get();

                $salesanalysisarray = DB::table('orders')
                    ->whereDate('created_at','>=', $datefromSession)
                    ->whereDate('created_at', '<=', $datetoSession)
                    ->where('status', 'served')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get()
                    ->toArray();
            }

            else if($request->period == 'Years')
            {
                $total_cost = DB::raw('SUM(qty * cost) as total_cost');
                $total_grossrev = DB::raw('(SUM(price * qty)) as total_grossrev');
                $total_profit = DB::raw('(SUM(price * qty)) - (SUM(qty * cost)) as total_profit');

                $period = DB::raw('year(created_at) as period');
                $format = 'Y';

                $salesanalysis = DB::table('orders')
                    ->whereDate('created_at','>=', $datefromSession)
                    ->whereDate('created_at', '<=', $datetoSession)
                    ->where('status', 'served')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get();

                $salesanalysisarray = DB::table('orders')
                    ->whereDate('created_at','>=', $datefromSession)
                    ->whereDate('created_at', '<=', $datetoSession)
                    ->where('status', 'served')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get()
                    ->toArray();
            }

            else
            {
                $total_cost = DB::raw('SUM(qty * cost) as total_cost');
                $total_grossrev = DB::raw('(SUM(price * qty)) as total_grossrev');
                $total_profit = DB::raw('(SUM(price * qty)) - (SUM(qty * cost)) as total_profit');

                $period = DB::raw('date(created_at) as period');
                $format = 'F j, Y';

                $salesanalysis = DB::table('orders')
                    ->whereDate('created_at','>=', $datefromSession)
                    ->whereDate('created_at', '<=', $datetoSession)
                    ->where('status', 'served')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get();

                $salesanalysisarray = DB::table('orders')
                    ->whereDate('created_at','>=', $datefromSession)
                    ->whereDate('created_at', '<=', $datetoSession)
                    ->where('status', 'served')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get()
                    ->toArray();
            }
        }
        view()->share('salesanalysis', $salesanalysis);
        view()->share('datefrom', $datefromSession);
        view()->share('dateto', $datetoSession);
        view()->share('period', $period);

        view()->share('company', Company::all()->first());

        if($request->has('download')){
            $pdf = PDF::loadView('salesreports.salesanalysis.pdf');
            return $pdf->download('salesanalysis-'.Carbon::now().'.pdf');
        }

        return view('salesreports.salesanalysis.pdf');
    }
    public function index()
    {
        $currentdate = Carbon::today();
        $period = "Days";

        if(SystemSetting::first()->system_mode == 'Retailer')
        {
            if($period == 'Months')
            {
                $total_cost = DB::raw('SUM(qty * cost) as total_cost');
                $total_grossrev = DB::raw('(SUM(price * qty)) as total_grossrev');
                $total_profit = DB::raw('(SUM(price * qty)) - (SUM(qty * cost)) as total_profit');

                $period = DB::raw('month(created_at) as period');
                $format = 'F';

                $salesanalysis = DB::table('purchases')
                    ->whereDate('created_at','=', $currentdate)
                    ->where('status', 'paid')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get();

                $salesanalysisarray = DB::table('purchases')
                    ->whereDate('created_at','=', $currentdate)
                    ->where('status', 'paid')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get()
                    ->toArray();
            }

            else if($period == 'Years')
            {
                $total_cost = DB::raw('SUM(qty * cost) as total_cost');
                $total_grossrev = DB::raw('(SUM(price * qty)) as total_grossrev');
                $total_profit = DB::raw('(SUM(price * qty)) - (SUM(qty * cost)) as total_profit');

                $period = DB::raw('year(created_at) as period');
                $format = 'Y';

                $salesanalysis = DB::table('purchases')
                    ->whereDate('created_at','=', $currentdate)
                    ->where('status', 'paid')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get();

                $salesanalysisarray = DB::table('purchases')
                    ->whereDate('created_at','=', $currentdate)
                    ->where('status', 'paid')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get()
                    ->toArray();
            }

            else
            {
                $total_cost = DB::raw('SUM(qty * cost) as total_cost');
                $total_grossrev = DB::raw('(SUM(price * qty)) as total_grossrev');
                $total_profit = DB::raw('(SUM(price * qty)) - (SUM(qty * cost)) as total_profit');

                $period = DB::raw('date(created_at) as period');
                $format = 'j F Y';

                $salesanalysis = DB::table('purchases')
                    ->whereDate('created_at','=', $currentdate)
                    ->where('status', 'paid')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get();

                $salesanalysisarray = DB::table('purchases')
                    ->whereDate('created_at','=', $currentdate)
                    ->where('status', 'paid')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get()
                    ->toArray();
            }
        }

        else
        {
            if($period == 'Months')
            {
                $total_cost = DB::raw('SUM(qty * cost) as total_cost');
                $total_grossrev = DB::raw('(SUM(price * qty)) as total_grossrev');
                $total_profit = DB::raw('(SUM(price * qty)) - (SUM(qty * cost)) as total_profit');

                $period = DB::raw('month(created_at) as period');
                $format = 'F';

                $salesanalysis = DB::table('orders')
                    ->whereDate('created_at','=', $currentdate)
                    ->where('status', 'served')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get();

                $salesanalysisarray = DB::table('orders')
                    ->whereDate('created_at','=', $currentdate)
                    ->where('status', 'served')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get()
                    ->toArray();
            }

            else if($period == 'Years')
            {
                $total_cost = DB::raw('SUM(qty * cost) as total_cost');
                $total_grossrev = DB::raw('(SUM(price * qty)) as total_grossrev');
                $total_profit = DB::raw('(SUM(price * qty)) - (SUM(qty * cost)) as total_profit');

                $period = DB::raw('year(created_at) as period');
                $format = 'Y';

                $salesanalysis = DB::table('orders')
                    ->whereDate('created_at','=', $currentdate)
                    ->where('status', 'served')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get();

                $salesanalysisarray = DB::table('orders')
                    ->whereDate('created_at','=', $currentdate)
                    ->where('status', 'served')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get()
                    ->toArray();
            }

            else
            {
                $total_cost = DB::raw('SUM(qty * cost) as total_cost');
                $total_grossrev = DB::raw('(SUM(price * qty)) as total_grossrev');
                $total_profit = DB::raw('(SUM(price * qty)) - (SUM(qty * cost)) as total_profit');

                $period = DB::raw('date(created_at) as period');
                $format = 'j F Y';

                $salesanalysis = DB::table('orders')
                    ->whereDate('created_at','=', $currentdate)
                    ->where('status', 'served')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get();

                $salesanalysisarray = DB::table('orders')
                    ->whereDate('created_at','=', $currentdate)
                    ->where('status', 'served')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get()
                    ->toArray();
            }
        }

        return view('salesreports.salesanalysis.index', compact('salesanalysis', 'format', 'salesanalysisarray'));
    }







    public function search(Request $request)
    {
        
        if(SystemSetting::first()->system_mode == 'Retailer')
        {
            if($request->period == 'Months')
            {
                $total_cost = DB::raw('SUM(qty * cost) as total_cost');
                $total_grossrev = DB::raw('(SUM(price * qty)) as total_grossrev');
                $total_profit = DB::raw('(SUM(price * qty)) - (SUM(qty * cost)) as total_profit');

                $period = DB::raw('month(created_at) as period');
                $format = 'F';

                $salesanalysis = DB::table('purchases')
                    ->whereDate('created_at','>=', $request->datefrom)
                    ->whereDate('created_at', '<=', $request->dateto)
                    ->where('status', 'paid')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get();

                $salesanalysisarray = DB::table('purchases')
                    ->whereDate('created_at','>=', $request->datefrom)
                    ->whereDate('created_at', '<=', $request->dateto)
                    ->where('status', 'paid')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get()
                    ->toArray();
            }

            else if($request->period == 'Years')
            {
                $total_cost = DB::raw('SUM(qty * cost) as total_cost');
                $total_grossrev = DB::raw('(SUM(price * qty)) as total_grossrev');
                $total_profit = DB::raw('(SUM(price * qty)) - (SUM(qty * cost)) as total_profit');

                $period = DB::raw('year(created_at) as period');
                $format = 'Y';

                $salesanalysis = DB::table('purchases')
                    ->whereDate('created_at','>=', $request->datefrom)
                    ->whereDate('created_at', '<=', $request->dateto)
                    ->where('status', 'paid')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get();

                $salesanalysisarray = DB::table('purchases')
                    ->whereDate('created_at','>=', $request->datefrom)
                    ->whereDate('created_at', '<=', $request->dateto)
                    ->where('status', 'paid')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get()
                    ->toArray();
            }

            else
            {
                $total_cost = DB::raw('SUM(qty * cost) as total_cost');
                $total_grossrev = DB::raw('(SUM(price * qty)) as total_grossrev');
                $total_profit = DB::raw('(SUM(price * qty)) - (SUM(qty * cost)) as total_profit');

                $period = DB::raw('date(created_at) as period');
                $format = 'j F Y';

                $salesanalysis = DB::table('purchases')
                    ->whereDate('created_at','>=', $request->datefrom)
                    ->whereDate('created_at', '<=', $request->dateto)
                    ->where('status', 'paid')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get();

                $salesanalysisarray = DB::table('purchases')
                    ->whereDate('created_at','>=', $request->datefrom)
                    ->whereDate('created_at', '<=', $request->dateto)
                    ->where('status', 'paid')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get()
                    ->toArray();
            }
        }

        else
        {
            if($request->period == 'Months')
            {
                $total_cost = DB::raw('SUM(qty * cost) as total_cost');
                $total_grossrev = DB::raw('(SUM(price * qty)) as total_grossrev');
                $total_profit = DB::raw('(SUM(price * qty)) - (SUM(qty * cost)) as total_profit');

                $period = DB::raw('month(created_at) as period');
                $format = 'F';

                $salesanalysis = DB::table('orders')
                    ->whereDate('created_at','>=', $request->datefrom)
                    ->whereDate('created_at', '<=', $request->dateto)
                    ->where('status', 'served')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get();

                $salesanalysisarray = DB::table('orders')
                    ->whereDate('created_at','>=', $request->datefrom)
                    ->whereDate('created_at', '<=', $request->dateto)
                    ->where('status', 'served')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get()
                    ->toArray();
            }

            else if($request->period == 'Years')
            {
                $total_cost = DB::raw('SUM(qty * cost) as total_cost');
                $total_grossrev = DB::raw('(SUM(price * qty)) as total_grossrev');
                $total_profit = DB::raw('(SUM(price * qty)) - (SUM(qty * cost)) as total_profit');

                $period = DB::raw('year(created_at) as period');
                $format = 'Y';

                $salesanalysis = DB::table('orders')
                    ->whereDate('created_at','>=', $request->datefrom)
                    ->whereDate('created_at', '<=', $request->dateto)
                    ->where('status', 'served')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get();

                $salesanalysisarray = DB::table('orders')
                    ->whereDate('created_at','>=', $request->datefrom)
                    ->whereDate('created_at', '<=', $request->dateto)
                    ->where('status', 'served')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get()
                    ->toArray();
            }

            else
            {
                $total_cost = DB::raw('SUM(qty * cost) as total_cost');
                $total_grossrev = DB::raw('(SUM(price * qty)) as total_grossrev');
                $total_profit = DB::raw('(SUM(price * qty)) - (SUM(qty * cost)) as total_profit');

                $period = DB::raw('date(created_at) as period');
                $format = 'j F Y';

                $salesanalysis = DB::table('orders')
                    ->whereDate('created_at','>=', $request->datefrom)
                    ->whereDate('created_at', '<=', $request->dateto)
                    ->where('status', 'served')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get();

                $salesanalysisarray = DB::table('orders')
                    ->whereDate('created_at','>=', $request->datefrom)
                    ->whereDate('created_at', '<=', $request->dateto)
                    ->where('status', 'served')
                    ->select($total_cost, $total_grossrev, $total_profit, $period, 'created_at')
                    ->groupBy('period')
                    ->get()
                    ->toArray();
            }
        }

        $request->session()->put('datefrom', $request->datefrom);
        $request->session()->put('dateto', $request->dateto);
        $request->session()->put('period', $request->period);
        return view('salesreports.salesanalysis.index', compact('salesanalysis', 'format', 'salesanalysisarray'));
    }

=======
    public function index()
    {

        $currentdate = Carbon::today();
        if(SystemSetting::first()->system_mode == 'Retailer')
        {
            $qty = DB::raw('SUM(purchases.qty) as qty');
            $total_cost = DB::raw('SUM(purchases.qty)*purchases.cost as total_cost');
            $gross_rev = DB::raw('(purchases.price*(SUM(purchases.qty))) as gross_rev');
            $profit = DB::raw('((purchases.price*(SUM(purchases.qty))) - (SUM(purchases.qty)*purchases.cost)) as profit');
            $percent = DB::raw('((((purchases.price*(SUM(purchases.qty)))- SUM(purchases.qty)*purchases.cost)/(purchases.price*(SUM(purchases.qty))))*100)as percent ');

            $salesanalysis =  DB::table('purchases')
                ->whereDate('purchases.created_at','=', $currentdate)
                ->where('purchases.status', 'paid')
                ->select('purchases.ref_code', $qty,'purchases.cost', $total_cost,'purchases.price', $gross_rev, $profit, $percent)
                ->groupBy('purchases.ref_code')
                ->orderBy('purchases.qty', 'dsc')
                ->get(); 
        }   
        else
        {
            $qty = DB::raw('SUM(orders.qty) as qty');
            $total_cost = DB::raw('SUM(orders.qty)*orders.cost as total_cost');
            $gross_rev = DB::raw('(orders.price*(SUM(orders.qty))) as gross_rev');
            $profit = DB::raw('((orders.price*(SUM(orders.qty))) - (SUM(orders.qty)*orders.cost)) as profit');
            $percent = DB::raw('((((orders.price*(SUM(orders.qty)))- SUM(orders.qty)*orders.cost)/(orders.price*(SUM(orders.qty))))*100)as percent ');

            $salesanalysis =  DB::table('orders')
                ->whereDate('orders.created_at','=', $currentdate)
                ->where('orders.status', 'paid')
                ->select('orders.ref_code', $qty,'orders.cost', $total_cost,'orders.price', $gross_rev, $profit, $percent)
                ->groupBy('orders.ref_code')
                ->orderBy('orders.qty', 'dsc')
                ->get();    
        }

            $total_cost = 0;
            $total_gross_rev = 0;
            $total_profit = 0;
            
            foreach ($salesanalysis as $item) 
            {
                $total_cost += $item->total_cost;
                $total_gross_rev += $item->gross_rev;
                $total_profit += $item->profit;
            }
            return view('salesreports.salesanalysis.index',compact('salesanalysis','total_cost','total_gross_rev','total_profit'));

            // $qty = DB::raw('SUM(orders.qty) as qty');
            // $total_cost = DB::raw('SUM(orders.qty)*orders.cost as total_cost');
            // $gross_rev = DB::raw('(menus.price*(SUM(orders.qty))) as gross_rev');
            // $profit = DB::raw('((menus.price*(SUM(orders.qty))) - (SUM(orders.qty)*orders.cost)) as profit');
            // $percent = DB::raw('((((menus.price*(SUM(orders.qty)))- SUM(orders.qty)*orders.cost)/(menus.price*(SUM(orders.qty))))*100)as percent ');
            // $currentdate = Carbon::today();
            
            // $salesanalysis =  DB::table('orders')
            //     ->join('menus', 'orders.menu_id', '=', 'menus.id')
            //     ->whereDate('orders.created_at','=', $currentdate)
            //     ->where('orders.status', 'served')
            //     ->select('orders.menu_id', $qty,'orders.cost', $total_cost,'menus.price', $gross_rev, $profit, $percent)
            //     ->groupBy('orders.menu_id')
            //     ->orderBy('orders.qty', 'dsc')
            // ->get();

        // $order_ref_codes = DB::table('orders')->pluck('ref_code');
        // $purchase_ref_codes = DB::table('purchases')->pluck('ref_code');

        // $orders = Receipt::SalesAnalysis('orders', $order_ref_codes);
        // $purchases = Receipt::SalesAnalysis('purchases', $purchase_ref_codes);

        // $transactions = array_merge($orders, $purchases);

        // $total_cost = 0;
        // $total_gross_rev = 0;
        // $total_profit = 0;

        // foreach($transactions as $key => $value) {
        //     $total_cost += $value['total_cost'];
        //     $total_gross_rev += $value['gross_rev'];
        //     $total_profit += $value['profit'];
        // }

        // return view('salesreports.salesanalysis.index',compact('transactions','total_cost','total_gross_rev','total_profit'));        
    }

    public function search(Request $request)
    {
            if($request->period == 'Daily'){
                $datefrom = Carbon::now()->startOfDay();
                $dateto = Carbon::now()->endOfDay();
            }
            elseif ($request->period == 'Weekly') {
                $datefrom = Carbon::now()->startOfWeek();
                $dateto = Carbon::now()->endOfWeek();
            }
            elseif ($request->period == 'Monthly') {
                $datefrom = Carbon::now()->startOfMonth();
                $dateto = Carbon::now()->endOfMonth();
            }
            elseif ($request->period == 'Yearly'){
                $datefrom = Carbon::now()->startOfYear();
                $dateto = Carbon::now()->endOfYear();   
            }
            else
            {
                $datefrom = Carbon::parse($request->datefrom);
                $dateto = Carbon::parse($request->dateto);
            }


            if(SystemSetting::first()->system_mode == 'Retailer')
            {
                $qty = DB::raw('SUM(purchases.qty) as qty');
                $total_cost = DB::raw('SUM(purchases.qty)*purchases.cost as total_cost');
                $gross_rev = DB::raw('(purchases.price*(SUM(purchases.qty))) as gross_rev');
                $profit = DB::raw('((purchases.price*(SUM(purchases.qty))) - (SUM(purchases.qty)*purchases.cost)) as profit');
                $percent = DB::raw('((((purchases.price*(SUM(purchases.qty)))- SUM(purchases.qty)*purchases.cost)/(purchases.price*(SUM(purchases.qty))))*100)as percent ');

                $salesanalysis =  DB::table('purchases')
                    ->whereDate('created_at','>=', $datefrom)
                    ->whereDate('created_at', '<=', $dateto)
                    ->where('purchases.status', 'paid')
                    ->select('purchases.ref_code', $qty,'purchases.cost', $total_cost,'purchases.price', $gross_rev, $profit, $percent)
                    ->groupBy('purchases.ref_code')
                    ->orderBy('purchases.qty', 'dsc')
                    ->get(); 
            }   
            else
            {
                $qty = DB::raw('SUM(orders.qty) as qty');
                $total_cost = DB::raw('SUM(orders.qty)*orders.cost as total_cost');
                $gross_rev = DB::raw('(orders.price*(SUM(orders.qty))) as gross_rev');
                $profit = DB::raw('((orders.price*(SUM(orders.qty))) - (SUM(orders.qty)*orders.cost)) as profit');
                $percent = DB::raw('((((orders.price*(SUM(orders.qty)))- SUM(orders.qty)*orders.cost)/(orders.price*(SUM(orders.qty))))*100)as percent ');

                $salesanalysis =  DB::table('orders')
                    ->whereDate('created_at','>=', $datefrom)
                    ->whereDate('created_at', '<=', $dateto)
                    ->where('orders.status', 'paid')
                    ->select('orders.ref_code', $qty,'orders.cost', $total_cost,'orders.price', $gross_rev, $profit, $percent)
                    ->groupBy('orders.ref_code')
                    ->orderBy('orders.qty', 'dsc')
                    ->get();    
            }

                $total_cost = 0;
                $total_gross_rev = 0;
                $total_profit = 0;
                
                foreach ($salesanalysis as $item) 
                {
                    $total_cost += $item->total_cost;
                    $total_gross_rev += $item->gross_rev;
                    $total_profit += $item->profit;
                }
                return view('salesreports.salesanalysis.index',compact('salesanalysis','total_cost','total_gross_rev','total_profit'));



            //return $datefrom;

        //      $order_ref_codes = DB::table('orders')
        //          ->whereDate('created_at','>=', $datefrom)
        //          ->whereDate('created_at', '<=', $dateto)
        //          ->pluck('ref_code');

        //      $orders = Receipt::SalesAnalysis('orders', $order_ref_codes);

        // //     // return view('salesreports.salesanalysis.index',compact('orders'));      

        //  $order_ref_codes = DB::table('orders')
        //                      ->whereDate('created_at','>=', $datefrom)
        //                      ->whereDate('created_at', '<=', $dateto)
        //                      ->pluck('ref_code');

        //  $purchase_ref_codes = DB::table('purchases')
        //                     ->whereDate('created_at','>=', $datefrom)
        //                     ->whereDate('created_at', '<=', $dateto)
        //                     ->pluck('ref_code');

        //  $orders = Receipt::SalesAnalysis('orders', $order_ref_codes);
        //  $purchases = Receipt::SalesAnalysis('purchases', $purchase_ref_codes);

        //  $transactions = array_merge($orders, $purchases);

        //  $total_cost = 0;
        //  $total_gross_rev = 0;
        //  $total_profit = 0;

        //  foreach($transactions as $key => $value) {
        //      $total_cost += $value['total_cost'];
        //      $total_gross_rev += $value['gross_rev'];
        //      $total_profit += $value['profit'];
        //  }

        //  return view('salesreports.salesanalysis.index',compact('transactions','total_cost','total_gross_rev','total_profit'));  
    }
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
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
