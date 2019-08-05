<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Company;
use PDF;

class VoidReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        $items =  DB::table('receipts')
            ->whereDate('receipts.created_at','>=', $datefrom)
            ->whereDate('receipts.created_at', '<=', $dateto)
            ->where('status', 'voided')
            ->get();

        view()->share('items', $items);
        view()->share('datefrom', $datefrom);
        view()->share('dateto', $dateto);
        view()->share('period', $period);
        view()->share('company', Company::all()->first());

        if($request->has('download')){
            $pdf = PDF::loadView('salesreports.voidreports.pdf');
            return $pdf->download('voidreport-'.Carbon::now().'.pdf');
        }

        return view('salesreports.voidreports.pdf');

    }
    public function index()
    {

        $currentdate = Carbon::today();
        $items =  DB::table('receipts')
            ->whereDate('created_at', '=', $currentdate)
            ->where('status', 'voided')
            ->get();
        // return $items;

        return view('salesreports.voidreports.index',compact('items'));
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


        $items =  DB::table('receipts')
            ->whereDate('receipts.created_at','>=', $datefrom)
            ->whereDate('receipts.created_at', '<=', $dateto)
            ->where('status', 'voided')
            ->get();

        $request->session()->put('datefrom', $request->datefrom);
        $request->session()->put('dateto', $request->dateto);
        $request->session()->put('period', $request->period);

        return view('salesreports.voidreports.index',compact('items'));

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
