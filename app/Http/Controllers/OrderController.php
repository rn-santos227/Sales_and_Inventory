<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receipt;
use App\User;
use App\SystemSetting;
use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Facades\Input;
use Hash;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function getMode()
    {
        $mode = SystemSetting::first()->system_mode;
        return Response::json(['success'=>true,'mode'=>$mode]);
    }
    public function index()
    {  
            $currentdate = Carbon::today();
            $receipts = DB::table('receipts')
                ->whereDate('created_at','=', $currentdate)
                ->orderBy('status','asc')
                ->orderBy('created_at','dsc')
                ->get();

            $mode = SystemSetting::first()->system_mode;
            return view('orders.index',compact('receipts','mode'));
     
=======
    public function index()
    {

        $currentdate = Carbon::today();

        $receipts = DB::table('receipts')
            ->whereDate('created_at','=', $currentdate)
            ->orderBy('status','asc')
            ->orderBy('created_at','dsc')
            ->get();

        $mode = SystemSetting::first()->system_mode;
        return view('orders.index',compact('receipts','mode'));

>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        // $receipts = DB::table('users')
        //             ->get();
        // return $receipts;
    }
<<<<<<< HEAD
    
    public function viewOrder(Request $request)
    {
        if(SystemSetting::first()->system_mode == 'Restaurant'||SystemSetting::first()->system_mode == 'FastFood')
        {
            $receipts = DB::table('receipts')
                        ->where('id','=', $request->id)
                        ->get();
            $orders = DB::table('orders')   
                    ->where('receipt_id','=', $request->id)
                    ->get();    
        }
        else
        {
            $receipts = DB::table('receipts')
                    ->where('id','=', $request->id)
                    ->get();
            $purchases = DB::table('purchases')
                    ->where('receipt_id','=', $request->id);
        }
            

        // return $receipts;
=======

    public function viewOrder(Request $request)
    {
        $receipts = DB::table('receipts')
                    ->where('id','=', $request->id)
                    ->get();

        $purchases = DB::table('purchases')
                    ->where('receipt_id','=', $request->id);

        $orders = DB::table('orders')   
                    ->where('receipt_id','=', $request->id)
                    ->union($purchases)
                    ->get();        

            // return $receipts;
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        // return Response::json(['success'=>true,'receipts'=>$receipts]);  
        return Response::json(['success'=>true,'orders'=>$orders,'receipts'=>$receipts]);  
    }
    public function confirmPassword(Request $request)
    {
<<<<<<< HEAD
=======
        // if (User::where('password', '=', $request->password)->exists()) {
        //     return Response::json(['success'=>true]);  
        // }

        // $password = Hash::make($request->password);
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        $users = DB::table('users')
                    ->where('user_level','=', 'Administrator')
                    ->get();
        foreach ($users as $item) 
        {
            if (Hash::check($request->password,$item->password))
            {
                return Response::json(['success'=>true,'password'=>$item->password]); 
            }   
        }
<<<<<<< HEAD
        
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    }
    public function searchOrder(Request $request)
    {
        $receipts = DB::table('receipts')
            ->whereDate('created_at','>=', $request->datefrom)
<<<<<<< HEAD
            ->whereDate('created_at','<=', $request->dateto)
=======
            ->whereDate('created_at', '<=', $request->dateto)
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
            ->orderBy('status','dsc')
            ->orderBy('created_at','asc')
            ->get();
  
        return Response::json(['success'=>true,'receipts'=>$receipts]);  
    }

    public function searchID(Request $request)
    {
        $receipts = DB::table('receipts')
            ->where('id', 'like', $request->id.'%')
            ->orderBy('status','dsc')
            ->orderBy('created_at','asc')
            ->get();
  
        return Response::json(['success'=>true,'receipts'=>$receipts]);  
    }

    public function voidOrder(Request $request)
    {
        if(SystemSetting::first()->system_mode == 'Retailer')
        {
            DB::table('receipts')
            ->where('id', $request->id)
            ->update(['status' => 'voided']);

            DB::table('purchases')
            ->where('receipt_id', $request->id)
            ->update(['status' => 'voided']);

            return Response::json(['success'=>true]);
        }
        else
        {
            DB::table('receipts')
            ->where('id', $request->id)
            ->update(['status' => 'voided']);

            DB::table('orders')
            ->where('receipt_id', $request->id)
            ->update(['status' => 'voided']);

            return Response::json(['success'=>true]);
        }
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

    public function search(Request $request)
    {
        // if($request->datefrom == null)
        // {
        //     $datefrom = Carbon::today();
        // }

        // elseif($request->dateto == null)
        // {
        //     $dateto = Carbon::today();
        // }

        // else
        // {
        //     $datefrom = Carbon::parse($request->datefrom);
        //     $dateto = Carbon::parse($request->dateto);
        // }

        // return 'dsadsa';
    }
}
