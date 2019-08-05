@extends('admin.home')

@section('page')
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Product List
            </div>

<<<<<<< HEAD
            <div class="panel-body"  style="overflow: scroll; overflow-x: hidden; height: 44vh;">
=======
            <div class="panel-body">
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                <div class="form-group">
                    <input type="text" id="searchStr" placeholder="Enter Product Reference Code..." class="form-control" style="width: 100%;">
                </div>

<<<<<<< HEAD
                <table id="myTable" class="table table-hover itemsTable" style="height: 50%;" >
                    <thead>
                        <tr>
                            <th>Reference Code</th>
                            <th>Name</th>
                            <th>Category</th>
                        </tr>
                    </thead>

=======
                <table id="myTable" class="table table-hover itemsTable">
                 <thead>
                    <tr>
                        <th>Reference Code</th>
                        <th>Name</th>
                        <th>Category</th>
                    </tr>
                
                </thead>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
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
<<<<<<< HEAD
        <div class="panel panel-default" style="height: 51.2vh;">
=======
        <div class="panel panel-default">
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
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
<<<<<<< HEAD
                                <div class='col-md-6 pull-left'><strong>Supplier:</strong></div>
                                <div class='col-md-6 pull-right' id='prodSupplier'></div>
                                <input type='hidden' id='prodSupplierHidden'>
                            </div>

                            <div class='row'>
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
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
<<<<<<< HEAD
                                <div class='col-md-6 pull-left'><strong>Excise Tax:</strong></div>
                                <div class='col-md-6 pull-right'>
                                    <input id='prodTax' type='number' min='0' value='0'  style='border: none; width: 50%; height: 50%;'>
                                </div>
                            </div>

                            <div class='row'>
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
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
<<<<<<< HEAD

                            <div class='row'>
                                <div class='col-md-6 pull-left'><strong>Expiration Date:</strong></div>
                                <div class='col-md-6 pull-right'>
                                    <input id='prodExpDate' type='date' style='border: none; width: 70%; height: 50%;'>
                                </div>
                            </div>
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                        </div>
                    </div>
                </div>
            </div>

            <div id="footer" class="panel-footer clearfix">
<<<<<<< HEAD
                <button class="pull-right btn btn-success btn-sm" id="addToInventory">Add to Inventory</button>
            </div>

=======
                <button class="pull-right btn btn-success" id="addToInventory">Add to Inventory</button>
            </div>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
<<<<<<< HEAD
                Inventory
            </div>

            <div class="panel-body">
                <ul class="nav nav-tabs">
                  <li id = "currentInventory" class="active"><a>Current Inventory </a></li>
                  <li id = "inactiveInventory"><a>Inactive Inventory </a></li>
                </ul>

                <div id="inventorylist">
                    <table id="myTable" class="table table-hover rowClick sort">
                        <thead>
                            <tr>
                                <th style="display:none;">ID</th>
                                <th>Reference Code</th>
                                <th>Name</th>
                                <th>Supplier</th>
                                <th>Cost</th>
                                <th>Price</th>
                                <th>Tax</th>
                                <th>Quantity</th>
                                <th>Re-order Point</th>
                                <th>Expiration Date</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($inventories as $inventory) 
                            <tr>
                                <td style="display:none;">{{$inventory->id}}</td>
                                <td>{{$inventory->ref_code}}</td>
                                <td>{{$inventory->name}}</td>
                                <td>{{$inventory->supplier_id}}</td>
                                <td>{{$inventory->cost}}</td>
                                <td>{{$inventory->price}}</td>
                                <td>{{$inventory->tax}}%</td>
                                <td>{{$inventory->quantity}}</td>
                                <td>{{$inventory->reorder_point}}</td>
                                <td>{{$inventory->expiration_date}}</td>
                                <td><button id="{{$inventory->id}}" class='btn btn-xs btn-danger btn_delete' style='border-radius: 50%;'><i class='fa fa-trash' aria-hidden='true'></i></button></td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="inventoryFooter" class="panel-footer clearfix">
                <input type="hidden" id="inventoryID">
                <input type="hidden" id="inventoryRef_code">
                <button class="pull-right btn btn-primary btn-sm" id="updatecost" style="margin-left: 1%;">Update Cost</button>
                <button class="pull-right btn btn-primary btn-sm" id="updateprice" style="margin-left: 1%;">Update Price</button>
                <button class="pull-right btn btn-primary btn-sm" id="updatetax" style="margin-left: 1%;">Update Tax</button>
                <button class="pull-right btn btn-primary btn-sm" id="updatereorderpoint" style="margin-left: 1%;">Update Re-order Point</button>
                <button class="pull-right btn btn-primary btn-sm hide" id="updatestocks" style="margin-left: 1%;">Update Stocks</button>
                <button class="pull-right btn btn-primary btn-sm" id="updateexpdate" style="margin-left: 1%;">Update Expiration Date</button>
                <button class="pull-right btn btn-primary btn-sm" id="addstocks" style="margin-left: 1%;">Add Stocks</button>
                <button class="pull-right btn btn-danger btn-sm" id="pullstocks" style="margin-left: 1%;">Pull Stocks</button>
                <button class="pull-right btn btn-danger btn-sm" id="setactin" style="margin-left: 1%;">Active/Inactive</button>
=======
                Inventory Management
            </div>

            <div class="panel-body">
                <table id="myTable" class="table table-hover">
                 <thead>
                    <tr>
                        <th>Reference Code</th>
                        <th>Name</th>
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
                            <td>{{$inventory->ref_code}}</td>
                            <td>{{$inventory->name}}</td>
                            <td><input id='inventoryCost' type='number' min='0' value='{{$inventory->cost}}'  style='border: none;'></td>
                            <td><input id='inventoryCost' type='number' min='0' value='{{$inventory->price}}'  style='border: none;'></td>
                            <td><input id='inventoryCost' type='number' min='0' value='{{$inventory->quantity}}'  style='border: none;'></td>
                            <td><input id='inventoryCost' type='number' min='0' value='{{$inventory->reorder_point}}'  style='border: none;'></td>
                            <td><button class='btn btn-warning btn-xs' type='button' id='{{$inventory->id}}'>Save</button></td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
            </div>
        </div>
    </div>
</div>

<<<<<<< HEAD
@include('dialogs.info')
@include('dialogs.error')
@include('inventory.updatetax')
@include('inventory.updateprice')
@include('inventory.updatecost')
@include('inventory.updatereorderpoint')
@include('inventory.addstocks')
@include('inventory.pullstocks')
@include('inventory.updatestocks')
@include('inventory.setstatus')
@include('inventory.updateexpiration')

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/inventory.js') }}"></script>
<!-- <script src="{{ asset('js/tablesort.js') }}"></script> -->
@endsection

=======
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/inventory.js') }}"></script>
<!-- <script src="{{ asset('js/tablesort.js') }}"></script> -->
@endsection
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
