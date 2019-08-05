@extends('admin.home')

@section('page')
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
<<<<<<< HEAD
            <div class="panel-heading"><h4><i class="fa fa-truck" aria-hidden="true"></i> Sales Reports</h4></div>
=======
            <div class="panel-heading"><h3><i class="fa fa-truck" aria-hidden="true"></i> Sales Reports</h3></div>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
            <div class="panel-body">
                <ul class="nav nav-tabs">
				  <li><a href="/salesreports/salesactivities">Sales Activity</a></li>
				  <li class="active"><a href="/salesreports/sellingitems">Top/Worst Selling Items</a></li>
<<<<<<< HEAD
				  <!-- <li><a href="/salesreports/grossprofits">Gross Profits</a></li> -->
                  <li><a href="/salesreports/salesanalysis">Sales Analysis</a></li>
                  <li><a href="/salesreports/voidreports">Void</a></li>
=======
				  <li><a href="/salesreports/grossprofits">Gross Profits</a></li>
                  <li><a href="/salesreports/salesanalysis">Sales Analysis</a></li>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
				</ul>

                <br>
                <form action="/salesreports/sellingitems/search" method="post" class="form-inline">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label>Date From:</label>
                            <input type="date" name="datefrom" id="datefrom" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Date To:</label>
                            <input type="date" name="dateto" id="dateto" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Period:</label>
                            <select name="period" id="period" class="form-control">
                                <option></option>
                                <option>Daily</option>
                                <option>Weekly</option>
                                <option>Monthly</option>
                                <option>Yearly</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-md" type="submit"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                        </div>
                </form>
                <br>
                <a href="{{ route('salesreports/sellingitems/pdf',['download'=>'pdf']) }}" class="pull-left"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Item</th>
                            <th>Total Earnings</th>
                            <th>Quantity Sold</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @forelse($items as $item) 
                            <tr>
                                <td>{{$item->ref_code}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->subtotal}}</td>
                                <td>{{$item->qty}}</td>
                                <td>{{\Carbon\Carbon::parse($item->created_at)->format('j F Y h:i A')}}</td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/tablesort.js') }}" type="text/javascript"></script>
@endsection
