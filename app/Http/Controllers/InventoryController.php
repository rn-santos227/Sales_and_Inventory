<?php

namespace App\Http\Controllers;

use App\Inventory;
<<<<<<< HEAD
use App\SystemSetting;
use Illuminate\Http\Request;
use Auth;
use DB;
use Response;
use App\AuditTrail;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(SystemSetting::first()->system_mode == 'Retailer') {
            $products = DB::table('items')
                ->join('categories', 'categories.id', '=', 'items.category_id')
                ->select('items.ref_code as refCode','items.name as itemName','categories.name as categoryName')
                ->orderBy('items.created_at','dsc')
                ->get();

            $inventories = DB::table('inventory')
                ->orderBy('id')
                ->where('active',1) 
                ->get();

            $suppliers = DB::table('suppliers')
                ->get();
                
            return view('inventory.index', compact('products', 'inventories','suppliers'));
        } else {
            return redirect()->back();
        }
    }

    public function showActiveInventory()
    {
        $inventories = DB::table('inventory')
            ->orderBy('id')
            ->where('active',1) 
            ->get();

        return Response::json(['success'=>true, 'inventories'=>$inventories]);
    }
    public function deleteEntry(Request $request)
    {
        DB::table('inventory')->where('id',$request->id)->delete();
        AuditTrail::create([
                            'user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Account Settings',
                            'activity' => 'Deleted ' . 'Inventory Entry'.$request->id, 
                        ]);
        return Response::json(['success'=>true]);
    }
    public function setStatus(Request $request)
    {
        // if($request->active == "Active")
        // {
        //     $val = 1;
        // }
        // else
        // {
        //     $val = 0;
        // }
        DB::table('inventory')
            ->where('id', $request->id)
            ->update(['active' => $request->active]);
            return Response::json(['success'=>true]); 

        AuditTrail::create([
                            'user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Account Settings',
                            'activity' => 'Udated ' . 'Inventory Status of '.$request->id, 
                        ]);
        return Response::json(['success'=>true]);
    }

    public function showInactiveInventory()
    {
        $inventories = DB::table('inventory')
            ->orderBy('id')
            ->where('active',0) 
            ->get();
            
        return Response::json(['success'=>true, 'inventories'=>$inventories]);
    }

    public function updatePrice(Request $request)
    {
        $inventory = DB::table('inventory')->select('price')->where('id', $request->id)->first();
        $currentprice = $inventory->price;

        if($request->price < 0)
        {
            return Response::json(['success'=>false]);
        }

        $inventorylogs = DB::table('inventory_logs')->insertGetId(
            [
                'inventory_id' => $request->id,
                'ref_code' => $request->ref_code,
                'user_id' => Auth::user()->id, 
                'field' => 'Price',
                'action' => 'Update',
                'old_value' => $currentprice,
                'new_value' => $request->price,
                'amount' => $request->price,
                'comment' => $request->comment,
                'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        );

        DB::table('inventory')
            ->where('id', $request->id)
            ->update(['price' => $request->price]);


        AuditTrail::create([
                            'user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Account Settings',
                            'activity' => 'Updated ' . 'price of Inventory Entry '.$request->id, 
                        ]);

            return Response::json(['success'=>true]); 
    }

    public function updateTax(Request $request)
    {
        $inventory = DB::table('inventory')->select('tax')->where('id', $request->id)->first();
        $currenttax = $inventory->tax;

        if($request->tax < 0)
        {
            return Response::json(['success'=>false]);
        }

        $inventorylogs = DB::table('inventory_logs')->insertGetId(
            [
                'inventory_id' => $request->id,
                'ref_code' => $request->ref_code,
                'user_id' => Auth::user()->id, 
                'field' => 'Tax',
                'action' => 'Update',
                'old_value' => $currenttax,
                'new_value' => $request->tax,
                'amount' => $request->tax,
                'comment' => $request->comment,
                'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        );

        DB::table('inventory')
            ->where('id', $request->id)
            ->update(['tax' => $request->tax]);


        AuditTrail::create([
                            'user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Account Settings',
                            'activity' => 'Updated ' . 'tax of Inventory Entry '.$request->id, 
                        ]);

            return Response::json(['success'=>true]); 
    }

    public function addStocks(Request $request)
    {
        $inventory = DB::table('inventory')->select('quantity')->where('id', $request->id)->first();
        $currentqty = $inventory->quantity;
        $newqty = $currentqty + $request->additional;

        if($request->additional < 0)
        {
            return Response::json(['success'=>false]);
        }

        $inventorylogs = DB::table('inventory_logs')->insertGetId(
            [
                'inventory_id' => $request->id,
                'user_id' => Auth::user()->id, 
                'ref_code' => $request->ref_code,
                'field' => 'Stocks',
                'action' => 'Add',
                'old_value' => $currentqty,
                'new_value' => $newqty,
                'amount' => $request->additional,
                'comment' => $request->comment,
                'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        );

        DB::table('inventory')
            ->where('id', $request->id)
            ->update(['quantity' => $newqty]);
            return Response::json(['success'=>true]); 

        AuditTrail::create([
                            'user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Account Settings',
                            'activity' => 'Added ' . 'Stocks of Inventory Entry '.$request->id, 
                        ]);

         return Response::json(['success'=>true,'currentqty'=> $currentqty,'newqty'=> $newqty]);
    }
    public function pullStocks(Request $request)
    {
        $inventory = DB::table('inventory')->select('quantity')->where('id', $request->id)->first();
        $currentqty = $inventory->quantity;
        $newqty = $currentqty-$request->pulled;


        if($newqty < 0)
        {
            return Response::json(['success'=>false]);
        }

        $inventorylogs = DB::table('inventory_logs')->insertGetId(
            [
                'inventory_id' => $request->id,
                'user_id' => Auth::user()->id, 
                'ref_code' => $request->ref_code,
                'field' => 'Stocks',
                'action' => 'Pull',
                'old_value' => $currentqty,
                'new_value' => $newqty,
                'amount' => $request->pulled,
                'comment' => $request->comment,
                'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        );

        DB::table('inventory')
            ->where('id', $request->id)
            ->update(['quantity' => $newqty]);


        AuditTrail::create([
                            'user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Account Settings',
                            'activity' => 'Pulled ' . 'stocks of Inventory Entry'.$request->id, 
                        ]);

            return Response::json(['success'=>true]); 

        // return Response::json(['success'=>true,'currentqty'=> $currentqty,'newqty'=> $newqty]);
    }
    public function updateCost(Request $request)
    {
        $inventory = DB::table('inventory')->select('cost')->where('id', $request->id)->first();
        $currentcost = $inventory->cost;

        if($request->cost < 0)
        {
            return Response::json(['success'=>false]);
        }

        $inventorylogs = DB::table('inventory_logs')->insertGetId(
            [
                'inventory_id' => $request->id,
                'ref_code' => $request->ref_code,
                'user_id' => Auth::user()->id, 
                'field' => 'Cost',
                'action' => 'Update',
                'old_value' => $currentcost,
                'new_value' => $request->cost,
                'amount' => $request->cost,
                'comment' => $request->comment,
                'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        );

        DB::table('inventory')
            ->where('id', $request->id)
            ->update(['cost' => $request->cost]);


        AuditTrail::create([
                            'user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Account Settings',
                            'activity' => 'Updated ' . 'cost of Inventory Entry'.$request->id, 
                        ]);

            return Response::json(['success'=>true]); 
    }
    public function updateReorderPoint(Request $request)
    {
        $inventory = DB::table('inventory')->select('reorder_point')->where('id', $request->id)->first();
        $currentreorder_point = $inventory->reorder_point;

        if($request->reorder_point < 0)
        {
            return Response::json(['success'=>false]);
        }

        $inventorylogs = DB::table('inventory_logs')->insertGetId(
            [
                'inventory_id' => $request->id,
                'ref_code' => $request->ref_code,
                'user_id' => Auth::user()->id, 
                'field' => 'Re-order Point',
                'action' => 'Update',
                'old_value' => $currentreorder_point,
                'new_value' => $request->reorder_point,
                'amount' => $request->reorder_point,
                'comment' => $request->comment,
                'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        );

        DB::table('inventory')
            ->where('id', $request->id)
            ->update(['reorder_point' => $request->reorder_point]);
            return Response::json(['success'=>true]);


        AuditTrail::create([
                            'user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Account Settings',
                            'activity' => 'Updated ' . 'reorder point of Inventory Entry'.$request->id, 
                        ]); 
    }
    public function updateExpDate(Request $request)
    {
        $inventory = DB::table('inventory')->select('expiration_date')->where('id', $request->id)->first();
        DB::table('inventory')
            ->where('id', $request->id)
            ->update(['expiration_date' => $request->date]);
        return Response::json(['success'=>true]); 
    }
    public function updateStocks(Request $request)
    {
        $inventory = DB::table('inventory')->select('quantity')->where('id', $request->id)->first();
        $currentqty = $inventory->quantity;

        $inventorylogs = DB::table('inventory_logs')->insertGetId(
            [
                'inventory_id' => $request->id,
                'ref_code' => $request->ref_code,
                'user_id' => Auth::user()->id, 
                'field' => 'Stocks',
                'action' => 'Update',
                'old_value' => $currentqty,
                'new_value' => $request->quantity,
                'amount' => $request->quantity,
                'comment' => $request->comment,
                'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        );

        DB::table('inventory')
            ->where('id', $request->id)
            ->update(['quantity' => $request->quantity]);


        AuditTrail::create([
                            'user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Account Settings',
                            'activity' => 'Updated ' . 'stocks of Inventory Entry'.$request->id, 
                        ]);
            return Response::json(['success'=>true]); 
    }
=======
use Illuminate\Http\Request;
use DB;
use Response;

class InventoryController extends Controller
{
    public function index()
    {
        $products = DB::table('items')
            ->join('categories', 'categories.id', '=', 'items.category_id')
            ->select('items.ref_code as refCode','items.name as itemName','categories.name as categoryName')
            ->orderBy('items.created_at','dsc')
            ->get();

        $inventories = DB::table('inventory')
            ->orderBy('id')
            ->get();
            
        return view('inventory.index', compact('products', 'inventories'));
    }

>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
<<<<<<< HEAD
        $inventory = DB::table('inventory')
            ->select('ref_code')
            ->get();

        $array = array(); 

        $items = DB::table('items')
            ->join('categories', 'categories.id', '=', 'items.category_id')
            ->where('items.ref_code', 'like', $request->ref_code.'%')
            // ->whereNotIn('ref_code',[1,1,1])
=======
        $items = DB::table('items')
            ->join('categories', 'categories.id', '=', 'items.category_id')
            ->where('items.ref_code', 'like', $request->ref_code.'%')
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
            ->select('items.ref_code as refCode','items.name as itemName','categories.name as categoryName')
            ->orderBy('items.created_at','dsc')
            ->get();
  
<<<<<<< HEAD
        return Response::json(['success'=>true,'items'=>$items,'inventory'=>$inventory]);  
=======
        return Response::json(['success'=>true,'items'=>$items]);  
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    }

    public function view(Request $request)
    {
        $items = DB::table('items')
            ->where('ref_code', '=', $request->ref_code)
<<<<<<< HEAD
            ->where('active',1)
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
            ->get();
        return Response::json(['success'=>true,'items'=>$items]);
    }

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
    public function addtoinventory(Request $request)
    {
<<<<<<< HEAD
        // $inventories = Inventory::create([
        //         'name' => $request->name, 
        //         'ref_code' => $request->ref_code,
        //         'supplier_id' => $request->supplier,
        //         'quantity' => $request->qty,
        //         'cost' => $request->cost,
        //         'price' => $request->price,
        //         'reorder_point' => $request->reorder_point
        //     ]);

        if($request->cost < 0 || $request->price < 0 || $request->tax < 0 || $request->qty < 0 || $request->reorder_point < 0)
        {
            return Response::json(['success'=>false]);
        }

        if($request->cost == '' || $request->price == '' || $request->tax == '' || $request->qty == '' || $request->reorder_point == '')
        {
            return Response::json(['success'=>false]);
        }
      
        $price = DB::table('price_history')->insertGetId(
            [
                'ref_code' => $request->ref_code, 
                'price' => $request->price, 
                'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        );

        $cost = DB::table('cost_history')->insertGetId(
            [
                'ref_code' => $request->ref_code, 
                'cost' => $request->cost, 
                'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        );

        $inventory = DB::table('inventory')->insertGetId(
            [
                'name' => $request->name, 
                'ref_code' => $request->ref_code,
                'supplier_id' => $request->supplier,
                'quantity' => $request->qty,
                'cost' => $request->cost,
                'price' => $request->price,
                'tax' => $request->tax,
                'reorder_point' => $request->reorder_point,
                'expiration_date' => $request->expiration_date,
                'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        );

        $create_inventorycost = DB::table('inventory_logs')->insertGetId(
            [
                'inventory_id' => $inventory,
                'user_id' => Auth::user()->id,
                'ref_code' => $request->ref_code,
                'field' => 'Cost',
                'action' => 'Add to Inventory',
                'old_value' => 0,
                'new_value' => $request->cost,
                'amount' => $request->cost,
                'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        );

        $create_inventoryprice = DB::table('inventory_logs')->insertGetId(
            [
                'inventory_id' => $inventory,
                'user_id' => Auth::user()->id,
                'ref_code' => $request->ref_code,
                'field' => 'Price',
                'action' => 'Add to Inventory',
                'old_value' => 0,
                'new_value' => $request->price,
                'amount' => $request->price,
                'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        );

        $create_inventorytax = DB::table('inventory_logs')->insertGetId(
            [
                'inventory_id' => $inventory,
                'user_id' => Auth::user()->id,
                'ref_code' => $request->ref_code,
                'field' => 'Tax',
                'action' => 'Add to Inventory',
                'old_value' => 0,
                'new_value' => $request->tax,
                'amount' => $request->tax,
                'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        );


        $create_inventoryquantity = DB::table('inventory_logs')->insertGetId(
            [
                'inventory_id' => $inventory,
                'user_id' => Auth::user()->id,
                'ref_code' => $request->ref_code,
                'field' => 'Stocks',
                'action' => 'Add to Inventory',
                'old_value' => 0,
                'new_value' => $request->qty,
                'amount' => $request->qty,
                'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        );

        $create_inventoryreorderpoint = DB::table('inventory_logs')->insertGetId(
            [
                'inventory_id' => $inventory,
                'user_id' => Auth::user()->id,
                'ref_code' => $request->ref_code,
                'field' => 'Re-order Point',
                'action' => 'Add to Inventory',
                'old_value' => 0,
                'new_value' => $request->reorder_point,
                'amount' => $request->reorder_point,
                'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        );

        // $beginning_inventory = DB::table('beginning_inventory')->insertGetId(
        //     [
        //         'inventory_id' => $inventory,
        //         'name' => $request->name, 
        //         'ref_code' => $request->ref_code,
        //         'quantity' => $request->qty,
        //         'cost' => $request->cost,
        //         'price' => $request->price,
        //         'created_at' =>  \Carbon\Carbon::now(),
        //         'updated_at' => \Carbon\Carbon::now()
        //     ]
        // );


        AuditTrail::create([
                            'user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Account Settings',
                            'activity' => 'Added ' . 'Inventory Entry'.$request->id, 
                        ]);

        return Response::json(['success'=>true]);
    }

    public function save(Request $request)
    {
        DB::table('inventory')
            ->where('id', $request->id)
            ->update([
                'quantity' => $request->qty,
                'cost' => $request->cost,
                'price' => $request->price,
                'reorder_point' => $request->reorder_point,
                ]);

        return Response::json(['success'=>true]);
=======
        DB::table('inventory')->insert([
            'name' => $request->name, 
            'ref_code' => $request->ref_code,
            'quantity' => $request->qty,
            'cost' => $request->cost,
            'price' => $request->price,
            'reorder_point' => $request->reorder_point
            ]
        );
        return Response::json(['success'=>true]);
    }

    public function store(Request $request)
    {
        
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        //
    }
}
