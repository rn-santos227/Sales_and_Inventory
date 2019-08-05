@extends('admin.home')

@section('page')
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Product List
            </div>

            <div class="panel-body">
                <div class="form-group">
                    <input type="text" id="searchStr" placeholder="Enter Product Reference Code..." class="form-control" style="width: 100%;">
                </div>

                <table id="myTable" class="table table-hover itemsTable" style="height: 50%;">
                 <thead>
                    <tr>
                        <th>Reference Code</th>
                        <th>Name</th>
                        <th>Category</th>
                    </tr>
                
                </thead>
                    <tbody>
                    @forelse($products as $product) 
                        <tr>
                            <td><a class="product_ref_code" id="{{$product->refCode}}">{{$product->refCode}}</a></td>
                            <td>{{$product->itemName}}</td>
                            <td>{{$product->categoryName}}</td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Product Information
            </div>

            <div class="panel-body">
                <div class="row">

                    <div id='productInfo'>
                        <div class='col-md-12' style='float: left;'>
                            <div class='row'>
                                <div class='col-md-6 pull-left'><strong>Reference Code:</strong></div>
                                <div class='col-md-6 pull-right' id='prodRefCode'></div>
                                <input type='hidden' id='prodRefCodeHidden'>
                            </div>

                            <div class='row'>
                                <div class='col-md-6 pull-left'><strong>Product Name:</strong></div>
                                <div class='col-md-6 pull-right' id='prodName'></div>
                                <input type='hidden' id='prodNameHidden'>
                            </div>

                            <div class='row'>
                                <div class='col-md-6 pull-left'><strong>Supplier:</strong></div>
                                <div class='col-md-6 pull-right' id='prodSupplier'></div>
                                <input type='hidden' id='prodSupplierHidden'>
                            </div>

                            <div class='row'>
                                <div class='col-md-6 pull-left'><strong>Cost:</strong></div>
                                <div class='col-md-6 pull-right'>
                                    <input id='prodCost' type='number' min='0' value='0'  style='border: none; width: 50%; height: 50%;'>
                                </div>
                            </div>

                            <div class='row'>
                                <div class='col-md-6 pull-left'><strong>Price:</strong></div>
                                <div class='col-md-6 pull-right'>
                                    <input id='prodPrice' type='number' min='0' value='0'  style='border: none; width: 50%; height: 50%;'>
                                </div>
                            </div>

                            <div class='row'>
                                <div class='col-md-6 pull-left'><strong>Quantity:</strong></div>
                                <div class='col-md-6 pull-right'>
                                    <input id='prodQty' type='number' min='0' value='0'  style='border: none; width: 50%; height: 50%;'>
                                </div>
                            </div>

                            <div class='row'>
                                <div class='col-md-6 pull-left'><strong>Re-order Point:</strong></div>
                                <div class='col-md-6 pull-right'>
                                    <input id='prodRop' type='number' min='0' value='0' style='border: none; width: 50%; height: 50%;'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="footer" class="panel-footer clearfix">
                <button class="pull-right btn btn-success btn-sm" id="addToInventory">Add to Inventory</button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Inventory 
            </div>

            <div class="panel-body">
                <table id="myTable" class="table table-hover rowClick">
                 <thead>
                    <tr>
                        <th>ID</th>
                        <th>Reference Code</th>
                        <th>Name</th>
                        <th>Supplier</th>
                        <th>Cost</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Re-order Point</th>
                        <th></th>
                    </tr>
                
                </thead>
                    <tbody>
                        @forelse($inventories as $inventory) 
                            <tr>
                                <td>{{$inventory->id}}</td>
                                <td>{{$inventory->ref_code}}</td>
                                <td>{{$inventory->name}}</td>
                                <td>{{$inventory->supplier_id}}</td>
                                <td>{{$inventory->cost}}</td>
                                <td>{{$inventory->price}}</td>
                                <td>{{$inventory->quantity}}</td>
                                <td>{{$inventory->reorder_point}}</td>
                                <td></td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div id="inventoryFooter" class="panel-footer clearfix">
                <input type="text" id="inventoryID">
                <button class="pull-right btn btn-primary btn-sm" id="" style="margin-left: 1%;">Update Price</button>
                <button class="pull-right btn btn-primary btn-sm" id="" style="margin-left: 1%;">Update Re-order Point</button>
                <button class="pull-right btn btn-primary btn-sm" id="" style="margin-left: 1%;">Add Stocks</button>
                <button class="pull-right btn btn-danger btn-sm" id="" style="margin-left: 1%;">Pull Stocks</button>
            </div>
        </div>
    </div>
</div>
@include('dialogs.success')
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/inventory.js') }}"></script>
<!-- <script src="{{ asset('js/tablesort.js') }}"></script> -->
@endsection


<?php

namespace App\Http\Controllers;

use App\Inventory;
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
            // ->groupBy('created_at')
            ->get();

        $suppliers = DB::table('suppliers')
            ->get();
            
        return view('inventory.index', compact('products', 'inventories','suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $items = DB::table('items')
            ->join('categories', 'categories.id', '=', 'items.category_id')
            ->where('items.ref_code', 'like', $request->ref_code.'%')
            ->select('items.ref_code as refCode','items.name as itemName','categories.name as categoryName')
            ->orderBy('items.created_at','dsc')
            ->get();
  
        return Response::json(['success'=>true,'items'=>$items]);  
    }

    public function view(Request $request)
    {
        $items = DB::table('items')
            ->where('ref_code', '=', $request->ref_code)
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
        $inventories = Inventory::create([
                'name' => $request->name, 
                'ref_code' => $request->ref_code,
                'supplier_id' => $request->supplier,
                'quantity' => $request->qty,
                'cost' => $request->cost,
                'price' => $request->price,
                'reorder_point' => $request->reorder_point
            ]);
        return Response::json(['success'=>true, 'inventories' => $inventories]);
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
