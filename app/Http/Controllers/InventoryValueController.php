<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Inventory;
use Carbon\Carbon;
use App\Company;
use PDF;

class InventoryValueController extends Controller
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
        $items = Inventory::all();

        $itemTotalCost = 0;
        $itemTotalValue = 0;

        foreach ($items as $item)
        {
            
            $itemTotalCost += $item->quantity * $item->cost;
            $itemTotalValue += $item->quantity * $item->price;
            
        }
        $itemTotalCost = number_format($itemTotalCost, 2, '.', ',');
        $itemTotalValue = number_format($itemTotalValue, 2, '.', ',');
        $mytime = Carbon::now();
        $mytimec= date('Y-m-d');
        return view('inventoryreports.inventoryvalue.index',compact('mytime', 'items','itemTotalCost','itemTotalValue'));
    }

    public function pdfview(Request $request)
    {
        $items = Inventory::all();

        $itemTotalCost = 0;
        $itemTotalValue = 0;

        foreach ($items as $item)
        {
            
            $itemTotalCost += $item->quantity * $item->cost;
            $itemTotalValue += $item->quantity * $item->price;
            
        }
        $currentdate = Carbon::today();
        view()->share('items', $items);
        view()->share('datefrom', $currentdate);
        view()->share('dateto', $currentdate);
        view()->share('period', 'Sales');
        view()->share('itemTotalCost', $itemTotalCost);
        view()->share('itemTotalValue', $itemTotalValue);
        view()->share('company', Company::all()->first());

        if($request->has('download'))
        {
            $pdf = PDF::loadView('inventoryreports.inventoryvalue.pdf');
            return $pdf->download('inventoryvalue-'.Carbon::now().'.pdf');
        }
        return view('inventoryreports.inventoryvalue.pdf');
    }

    public function create()
    {
        //
    }
}
