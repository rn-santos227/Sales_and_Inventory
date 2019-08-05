<?php

namespace App\Http\Controllers;

use App\Kitchen;
use Illuminate\Http\Request;
use App\SystemSetting;
use App\Order;
use App\Receipt;
use Response;
use DB;
<<<<<<< HEAD
use Auth;
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

class KitchenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
<<<<<<< HEAD
        if(SystemSetting::first()->system_mode != 'Retailer') {
            if(Auth::user()->user_level == 'Kitchen' || Auth::user()->user_level == 'Administrator') 
                return view('kitchens.index');
            else return redirect()->back(); 
        } else {
            return redirect()->back();            
        }
    }

    public function getMode()
    {
        $mode = SystemSetting::first()->system_mode;
        return Response::json(['success'=>true,'mode'=>$mode]);
    }
    public function load() 
    {
        $mode = SystemSetting::first()->system_mode;
        if($mode == 'FastFood')
=======
        return view('kitchens.index');
    }

    public function load() {
        
        

        if(SystemSetting::first()->system_mode == 'Retailer')
        {

        }
        else if(SystemSetting::first()->system_mode == 'FastFood')
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        {
            $receipt_ids = DB::table('receipts')
            ->where('status', 'paid_and_pending')
            ->pluck('id');

            $orders = DB::table('orders')
            ->where('status', 'pending')
            ->orderBy('receipt_id', 'asc')
            ->get();
        }
        else
        {
<<<<<<< HEAD
            $receipt_ids = DB::table('receipts')
            ->where('status', 'pending')
            ->pluck('id');

            $orders = DB::table('orders')
            ->orderBy('receipt_id', 'asc')
            ->get();
        } 
        return Response::json(['success'=>true,'orders'=>$orders, 'receipt_ids'=>$receipt_ids, 'mode'=>$mode]);  
    }

    public function set(Request $request) {
        $order = Order::findOrFail($request->id);
        $order->update([
            'status' =>'served'
        ]);
        
        return Response::json(['success'=>true]);
    }

     public function cancel(Request $request) {
        $order = Order::findOrFail($request->id);
        $order->update([
            'status' =>'pending'
        ]);
        
        return Response::json(['success'=>true]);
=======

        } 
        return Response::json(['success'=>true,'orders'=>$orders, 'receipt_ids'=>$receipt_ids]);  
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    }

    public function serve(Request $request) {
        if(SystemSetting::first()->system_mode == 'Retailer')
        {

        }
        else if(SystemSetting::first()->system_mode == 'FastFood')
        {
             DB::table('orders')
                ->where('receipt_id', $request->id)
                ->update([
<<<<<<< HEAD
                'status' => 'served',
=======
                'status' => 'paid',
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                ]);

            DB::table('receipts')
                ->where('id', $request->id)
                ->update([
                'status' => 'paid',
                ]);
        }
        else
        {

        }
       

        return redirect()->back();  
    }
}
