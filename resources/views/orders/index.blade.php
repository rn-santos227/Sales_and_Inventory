@extends('admin.home')

@section('page')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" style="margin-bottom: 1%;">
            <div class="panel-body">
                <form action="/orders/search" method="post" class="form-inline">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" name="dateto" id="search" value="" placeholder="Search by ID" class="form-control">
                    </div>
                    
                    <div class="form-group pull-right">
                        <button class="btn btn-primary btn-md" id = "ordersearch" type="button"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                    </div>
<<<<<<< HEAD
                    
                    <div class="form-group pull-right">
                        <label style="font-size: 80%;">To:</label>
                        <input type="date" name="dateto" id="dateto" value="" class="form-control" style="width: 78%; font-size: 60%;">
                    </div>
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                    <div class="form-group pull-right">
                        <label style="font-size: 80%;">From:</label>
                        <input type="date" name="datefrom" id="datefrom" value="" class="form-control" style="width: 78%; font-size: 60%;">
                    </div>
<<<<<<< HEAD
=======
                    <div class="form-group pull-right">
                        <label style="font-size: 80%;">To:</label>
                        <input type="date" name="dateto" id="dateto" value="" class="form-control" style="width: 78%; font-size: 60%;">
                    </div>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                    <input type="hidden" name="mode" id="mode" value = {{$mode}}>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Order List</div>
            <div class="panel-body">



                <table id="myTable" class="table table-hover OrdersTable">
                 <thead>
                    <tr>
                        <th>ID</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Time</th>
                    </tr>
                
                </thead>
                    <tbody>
                       @forelse($receipts as $receipt) 
                            <tr>
                                <td><a class="orderid" id="{{$receipt->id}}">{{$receipt->id}}</a></td>
                                <td>{{$receipt->total}}</td>
<<<<<<< HEAD
                                <td style="text-transform: capitalize;">{{$receipt->status}}</td>
=======
                                <td>{{$receipt->status}}</td>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                                <td>{{\Carbon\Carbon::parse($receipt->created_at)->format('h:i A')}}</td>
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
            <div class="panel-heading">Order Information</div>
            <div class="panel-body">
                <div id="Orderinfo">
                    <label id="receiptid"></label>
                    <table id="myTable" class="table table-hover ItemsTable">
                        <thead>
                            <th class="text-center">Name</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Each</th>
                            <th class="text-center">Subtotal</th>
                        </thead>
                        <tbody class="text-center">
                        </tbody>
                    </table>
                    <div class="row">
                        <div id="receipt">
                        </div>
                    </div>
                </div>
            </div>
            <div id="footer" class="panel-footer clearfix">
                
            </div>
        </div>
    </div>
</div>


@include('orders.void')

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/orderscript.js') }}" type="text/javascript"></script>
@endsection