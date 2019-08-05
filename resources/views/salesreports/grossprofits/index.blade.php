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
                  <li><a href="/salesreports/sellingitems">Top/Worst Selling Items</a></li>
<<<<<<< HEAD
                  <!-- <li class="active"><a href="/salesreports/grossprofits">Gross Profits</a></li> -->
                  <li><a href="/salesreports/salesanalysis">Sales Analysis</a></li>
                  <li><a href="/salesreports/voidreports">Void</a></li>
=======
                  <li class="active"><a href="/salesreports/grossprofits">Gross Profits</a></li>
                  <li><a href="/salesreports/salesanalysis">Sales Analysis</a></li>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                </ul>
                <br>

                <form action="" method="post" class="form-inline">
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
<<<<<<< HEAD
                
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Total Revenue</th>
                            <th>Cost of Goods Sold</th>
                            <th>Gross Profit</th>
=======
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Sales</th>
                            <th>Cost of Goods Sold</th>
                            <th>Gross Profit</th>
                            <th>Period</th>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                        </tr>
                    </thead>
                    
                    <tbody>
<<<<<<< HEAD
                        <tr>
                            <th>{{$totalSales}}</th>
                            <th>{{$totalCosts}}</th>
                            <th>{{$gross_profit}}</th>
                        </tr>
=======

>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
