<?php

namespace App\Http\Controllers;

use App\InventoryReport;
<<<<<<< HEAD
use App\Inventory;
use App\InventoryLogs;
use Illuminate\Http\Request;
use DB;

class InventoryReportController extends Controller
{

    public function index()
    {
        $beginninginventory = DB::table('beginning_inventory')
            // ->whereDate('created_at','>=', $request->datefrom)
            // ->whereDate('created_at', '<=', $request->dateto)
            ->orderBy('ref_code', 'asc')
            ->get();

        return view('inventoryreports.inventorybeginning-ending.index', compact('beginninginventory'));
    }

    public function search(Request $request)
    {
        //Beginning Inventory
        $beginninginventory = DB::table('beginning_inventory')
            ->whereDate('created_at','>=', $request->datefrom)
            ->whereDate('created_at', '<=', $request->dateto)
            ->get();


            
        // $dateupdated = DB::raw('MAX(updated_at) as lastUpdate');

        // $ids = Inventory::whereActive('1')
        //     ->whereDate('updated_at','>=', $request->datefrom)
        //     ->whereDate('updated_at', '<=', $request->dateto)
        //     ->pluck('ID');

        // $endinginventory = Inventory::whereIn('id',$ids)->get();

        return view('inventoryreports.inventorybeginning-ending.index', compact('beginninginventory'));
    }

=======
use Illuminate\Http\Request;
use App\Item;
use Carbon;

class InventoryReportController extends Controller
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
    {
        $items = Item::all();

        $itemTotalCost = 0;
        $itemTotalValue = 0;

        foreach ($items as $item)
        {
            
            $itemTotalCost += $item->quantity * $item->cost;
            $itemTotalValue += $item->quantity * $item->price;
            
        }
        $itemTotalCost = number_format($itemTotalCost, 2, '.', ',');
        $itemTotalValue = number_format($itemTotalValue, 2, '.', ',');
        $mytime = Carbon\Carbon::now();
        $mytimec= date('Y-m-d');
        return view('inventoryreport.index',compact('mytime', 'items','itemTotalCost','itemTotalValue'));
    }
    public function pdfview(Request $request)
    {
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    public function create()
    {
        //
    }

<<<<<<< HEAD
=======
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    public function store(Request $request)
    {
        //
    }

<<<<<<< HEAD
=======
    /**
     * Display the specified resource.
     *
     * @param  \App\InventoryReport  $inventoryReport
     * @return \Illuminate\Http\Response
     */
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    public function show(InventoryReport $inventoryReport)
    {
        //
    }

<<<<<<< HEAD
=======
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InventoryReport  $inventoryReport
     * @return \Illuminate\Http\Response
     */
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    public function edit(InventoryReport $inventoryReport)
    {
        //
    }

<<<<<<< HEAD
=======
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InventoryReport  $inventoryReport
     * @return \Illuminate\Http\Response
     */
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    public function update(Request $request, InventoryReport $inventoryReport)
    {
        //
    }

<<<<<<< HEAD
=======
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InventoryReport  $inventoryReport
     * @return \Illuminate\Http\Response
     */
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    public function destroy(InventoryReport $inventoryReport)
    {
        //
    }
}
