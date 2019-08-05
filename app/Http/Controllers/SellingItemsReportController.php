<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
<<<<<<< HEAD
use App\Company;
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
use App\SystemSetting;
use Carbon\Carbon;
use DB;
use PDF;
use App\AuditTrail;
use Auth;

class SellingItemsReportController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $solditems =  DB::table('menus')
        //     ->join('orders', 'orders.menu_id', '=', 'menus.id')
        //     ->where('orders.status', 'served')
        //     ->select('orders.*','menus.ref_code', DB::raw('SUM(orders.subtotal)  as subtotal'), DB::raw('SUM(orders.qty) as qty'))
        //     ->groupBy('menus.ref_code')
        //     ->orderBy('orders.qty', 'dsc')
        //     ->get();

        // $solditems = DB::table('orders')
        //         ->select('id','menus.ref_code', DB::raw('SUM(orders.subtotal)  as subtotal'), DB::raw('SUM(orders.qty) as qty'))
        //         ->groupBy('menus.ref_code')
        //         ->orderBy('orders.qty', 'dsc')
        //         ->get();

        // $solditems =  DB::table('orders')
        //     ->join('items', 'orders.menu_id', '=', 'items.id')
        //     ->where('orders.status', 'served')
        //     ->select('orders.*', DB::raw('SUM(orders.subtotal) as subtotal'), DB::raw('SUM(orders.qty) as qty'))
        //     ->groupBy('orders.menu_id')
        //     ->orderBy('orders.qty', 'dsc')
        //     ->get();

        // $solditems = DB::table('orders')->get();
        // $arr_solditems = json_decode($solditems);



        // return $solditems;

        // //for orders
        // $menus =  DB::table('orders')
        //     ->whereDate('created_at', '=', $currentdate)
        //     ->where('status', 'served')
        //     ->select('orders.*', DB::raw('SUM(orders.subtotal) as subtotal'), DB::raw('SUM(orders.qty) as QTY'))
        //     ->groupBy('ref_code')
        //     ->orderBy('qty', 'dsc');

        // //for purchases and orders
        // $items =  DB::table('purchases')
        //     ->whereDate('created_at', '=', $currentdate)
        //     ->where('status', 'served')
        //     ->select('purchases.*', DB::raw('SUM(purchases.subtotal) as subtotal'), DB::raw('SUM(purchases.qty) as QTY'))
        //     ->groupBy('ref_code')
        //     ->orderBy('qty', 'dsc')
        //     ->union($menus)
        //     ->get();


        $currentdate = Carbon::today();
        if(SystemSetting::first()->system_mode == 'Retailer')
        {
            $items =  DB::table('purchases')
            ->whereDate('created_at', '=', $currentdate)
            ->where('status', 'paid')
            ->select('purchases.*', DB::raw('SUM(purchases.subtotal) as subtotal'), DB::raw('SUM(purchases.qty) as qty'))
            ->groupBy('ref_code')
            ->orderBy('qty', 'dsc')
            ->get();
        }
<<<<<<< HEAD

=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        else
        {
            $items =  DB::table('orders')
            ->whereDate('created_at', '=', $currentdate)
<<<<<<< HEAD
            ->where('status', 'served')
=======
            ->where('status', 'paid')
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
            ->select('orders.*', DB::raw('SUM(orders.subtotal) as subtotal'), DB::raw('SUM(orders.qty) as qty'))
            ->groupBy('ref_code')
            ->orderBy('qty', 'dsc')
            ->get();
        }
        // return $items;
        session()->put('period', 'Daily');
        return view('salesreports.sellingitems.index', compact('items'));
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

    public function pdfview(Request $request)
    {
<<<<<<< HEAD
        $datefromSession = $request->session()->get('datefrom', 'default');
        $datetoSession = $request->session()->get('dateto', 'default');
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        $period = $request->session()->get('period', 'default');

        if($period == 'Daily'){
                $datefrom = Carbon::now()->startOfDay();
                $dateto = Carbon::now()->endOfDay();
            }
        elseif ($period == 'Weekly') {
            $datefrom = Carbon::now()->startOfWeek();
            $dateto = Carbon::now()->endOfWeek();
        }
        elseif ($period == 'Monthly') {
            $datefrom = Carbon::now()->startOfMonth();
            $dateto = Carbon::now()->endOfMonth();
        }
        elseif ($period == 'Yearly'){
            $datefrom = Carbon::now()->startOfYear();
            $dateto = Carbon::now()->endOfYear();   
        }
<<<<<<< HEAD
        else
        {
            $datefrom =  Carbon::parse($datefromSession);
            $dateto = Carbon::parse($datetoSession);
        }

         if(SystemSetting::first()->system_mode == 'Retailer')
        {
            $items =  DB::table('purchases')
            ->whereDate('purchases.created_at','>=', $datefrom)
            ->whereDate('purchases.created_at', '<=', $dateto)
            ->where('status', 'paid')
            ->select('purchases.*', DB::raw('SUM(purchases.subtotal) as subtotal'), DB::raw('SUM(purchases.qty) as QTY'))
            ->groupBy('ref_code')
            ->orderBy('qty', 'dsc')
            ->get();
        }
        else
        {
            $items =  DB::table('orders')
=======
        elseif($request->period == "")
        {
            $datefrom = Carbon::today();
            $dateto = Carbon::today();
            // $datefrom = $request->session()->get('datefrom', 'default');
            // $dateto = $request->session()->get('dateto', 'default');
        }
        else
        {
            $datefrom = Carbon::parse($request->datefrom);
            $dateto = Carbon::parse($request->dateto);
        }

        $menus =  DB::table('orders')
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
            ->whereDate('orders.created_at','>=', $datefrom)
            ->whereDate('orders.created_at', '<=', $dateto)
            ->where('status', 'paid')
            ->select('orders.*', DB::raw('SUM(orders.subtotal) as subtotal'), DB::raw('SUM(orders.qty) as QTY'))
            ->groupBy('ref_code')
<<<<<<< HEAD
            ->orderBy('qty', 'dsc')
            ->get();
        }

        view()->share('items', $items);
        view()->share('datefrom', $datefrom);
        view()->share('dateto', $dateto);
        view()->share('period', $period);
        view()->share('company', Company::all()->first());
=======
            ->orderBy('qty', 'dsc');

        //for purchases and orders
        $items =  DB::table('purchases')
            ->whereDate('purchases.created_at','>=', $datefrom)
            ->whereDate('purchases.created_at', '<=', $dateto)
            ->where('status', 'paid')
            ->select('purchases.*', DB::raw('SUM(purchases.subtotal) as subtotal'), DB::raw('SUM(purchases.qty) as QTY'))
            ->groupBy('ref_code')
            ->orderBy('qty', 'dsc')
            ->union($menus)
            ->get();

        view()->share('items', $items);
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

        if($request->has('download')){
            $pdf = PDF::loadView('salesreports.sellingitems.pdf');
            return $pdf->download('sellingitems-'.Carbon::now().'.pdf');
        }

        return view('salesreports.sellingitems.pdf');
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
<<<<<<< HEAD

=======
        elseif($request->period == "")
        {
            $datefrom = Carbon::today();
            $dateto = Carbon::today();
        }
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        else
        {
            $datefrom = Carbon::parse($request->datefrom);
            $dateto = Carbon::parse($request->dateto);
        }
            
        if(SystemSetting::first()->system_mode == 'Retailer')
        {
            $items =  DB::table('purchases')
            ->whereDate('purchases.created_at','>=', $datefrom)
            ->whereDate('purchases.created_at', '<=', $dateto)
            ->where('status', 'paid')
            ->select('purchases.*', DB::raw('SUM(purchases.subtotal) as subtotal'), DB::raw('SUM(purchases.qty) as QTY'))
            ->groupBy('ref_code')
            ->orderBy('qty', 'dsc')
            ->get();
        }
        else
        {
            $items =  DB::table('orders')
            ->whereDate('orders.created_at','>=', $datefrom)
            ->whereDate('orders.created_at', '<=', $dateto)
            ->where('status', 'paid')
            ->select('orders.*', DB::raw('SUM(orders.subtotal) as subtotal'), DB::raw('SUM(orders.qty) as QTY'))
            ->groupBy('ref_code')
            ->orderBy('qty', 'dsc')
            ->get();
        }

        $request->session()->put('datefrom', $request->datefrom);
        $request->session()->put('dateto', $request->dateto);
        $request->session()->put('period', $request->period);
  
        return view('salesreports.sellingitems.index',compact('items'));
    }
}
