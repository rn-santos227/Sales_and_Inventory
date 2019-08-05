<?php

namespace App\Http\Controllers;

use App\InventoryLogs;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use PDF;
use App\Receipt;
use App\Company;

class InventoryLogsController extends Controller
{

    public function index()
    {
        $currentdate = Carbon::today();
        $inventorylogs = DB::table('inventory_logs')
            ->whereDate('created_at','=', $currentdate)
            ->orderBy('created_at','dsc')
            ->get();
        session()->put('period', 'Daily');
        return view('inventoryreports.inventorylogs.index', compact('inventorylogs'));
    }
    public function pdfview(Request $request)
    {
        $datefromSession = $request->session()->get('datefrom', 'default');
        $datetoSession = $request->session()->get('dateto', 'default');
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
        else
        {
            $datefrom =  Carbon::parse($datefromSession);
            $dateto = Carbon::parse($datetoSession);
        }
            
        $inventorylogs = DB::table('inventory_logs')
            ->whereDate('created_at','>=', $datefrom)
            ->whereDate('created_at', '<=', $dateto)
            ->orderBy('created_at','dsc')
            ->get();

        view()->share('inventorylogs', $inventorylogs);
        view()->share('datefrom', $datefrom);
        view()->share('dateto', $dateto);
        view()->share('period', $period);
        view()->share('company', Company::all()->first());

        if($request->has('download')){
            $pdf = PDF::loadView('inventoryreports.inventorylogs.pdf');
            return $pdf->download('inventorylogs'.Carbon::now().'.pdf');
        }

        return view('inventoryreports.inventorylogs.pdf');
    }
    public function search(Request $request)
    {
        if($request->period == 'Daily')
        {
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
        $inventorylogs = DB::table('inventory_logs')
            ->whereDate('created_at','>=', $datefrom)
            ->whereDate('created_at', '<=', $dateto)
            ->orderBy('created_at','dsc')
            ->get();

        $request->session()->put('datefrom', $request->datefrom);
        $request->session()->put('dateto', $request->dateto);
        $request->session()->put('period', $request->period);
        
        return view('inventoryreports.inventorylogs.index', compact('inventorylogs'));
    }


}
