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
				  <!-- <li><a href="/salesreports/grossprofits">Gross Profits</a></li> -->
                  <li class="active"><a href="/salesreports/salesanalysis">Sales Analysis</a></li>
                  <li><a href="/salesreports/voidreports">Void</a></li>
				</ul>

                <br>
                <div class="row">
                    <div class="col-md-12">
                        <form action="/salesreports/salesanalysis/search" method="post" class="form-inline">
                            {{ csrf_field() }}
                            <div class="pull-left">
                                <div class="form-group">
                                    <label>Search by:</label>
                                    <select name="period" id="period" class="form-control periodOption">
                                        <option></option>
                                        <option>Days</option>
                                        <option>Months</option>
                                        <option>Years</option>
                                    </select>
                                </div>
                            </div>

                            <div class="pull-right">
                                <div class="form-group">
                                    <label>From:</label>
                                    <input type="date" name="datefrom" id="datefrom" class="form-control" disabled>
                                </div>

                                <div class="form-group">
                                    <label>To:</label>
                                    <input type="date" name="dateto" id="dateto" class="form-control" disabled>
                                </div>
                                
                                <div class="form-group">
                                    <button id="btnSearchRange" class="btn btn-primary btn-md" type="submit" disabled><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <br>

                <a href="{{ route('salesreports/salesanalysis/pdf',['download'=>'pdf']) }}" class="pull-left"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>
                <br>

                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Total Cost</th>
                            <th>Total Gross Revenue</th>
                            <th>Total Profit</th>
                            <th>Period</th>
=======
				  <li><a href="/salesreports/grossprofits">Gross Profits</a></li>
                  <li class="active"><a href="/salesreports/salesanalysis">Sales Analysis</a></li>
				</ul>

                <br>
                <form action="/salesreports/salesanalysis/search" method="post" class="form-inline">
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
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Ref Code</th>
                            <th>Qty.</th>
                            <th>Cost</th>
                            <th>Total Cost</th>
                            <th>Price</th>
                            <th>Gross Rev.</th>
                            <th>Profit</th>
                            <th>Gross Margin</th>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                        </tr>
                    </thead>
                    
                    <tbody>
<<<<<<< HEAD
                    @forelse($salesanalysis as $analysis) 
                        <tr>
                            <td>{{$analysis->total_cost}}</td>
                            <td>{{$analysis->total_grossrev}}</td>
                            <td>{{$analysis->total_profit}}</td>
                            <td>{{\Carbon\Carbon::parse($analysis->created_at)->format($format)}}</td>
=======
                    @forelse($salesanalysis as $item) 
                        <tr>
                            <td>{{$item->ref_code}}</td>
                            <td>{{$item->qty}}</td>
                            <td>{{$item->cost}}</td>
                            <td>{{$item->total_cost}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->gross_rev}}</td>
                            <td>{{$item->profit}}</td>
                            <td>{{$item->percent}}</td>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
<<<<<<< HEAD

                <div class="row" style="padding-bottom: 2%;">
                    <div class="col-md-12 hidden-xs hidden-sm">
                        <canvas id="salesAnalysisChart" style="height: 200px;"></canvas>
                    </div>
                </div>
=======
                        <strong>{{number_format($total_cost,2)}}</strong>
                        <strong>{{number_format($total_gross_rev,2)}}</strong>
                        <strong>{{number_format($total_profit,2)}}</strong>
                    
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD

<script src="{{ asset('js/Chart.min.js') }}"></script>

<script>
    var periodArray = new Array();
    var profitArray = new Array();
    var costArray = new Array();
    var grossRevArray = new Array();

    @forelse($salesanalysis as $analysis) 
    periodArray.push("{{\Carbon\Carbon::parse($analysis->created_at)->format($format)}}");
    profitArray.push("{{$analysis->total_profit}}");
    costArray.push("{{$analysis->total_cost}}");
    grossRevArray.push("{{$analysis->total_grossrev}}");
    @empty
    @endforelse

    let salesAnalysisChart = document.getElementById('salesAnalysisChart').getContext('2d');

    let barChart = new Chart(salesAnalysisChart, {
        responsive: true,
        type:'line',
        data:{
            datasets:[{
                label:'Cost',
                data: costArray,
                backgroundColor: 'rgba(73, 187, 235, 0.7)',
                hoverBorderWidth: 1,
                hoverBorderColor: '#000'
            }, {
                label:'Gross Revenue',
                data: grossRevArray,
                backgroundColor: 'rgba(245, 132, 159, 0.7)',
                hoverBorderWidth: 1,
                hoverBorderColor: '#000'
            }, {
                label:'Profit',
                data: profitArray,
                backgroundColor: 'rgba(238, 132, 245, 0.7)',
                hoverBorderWidth: 1,
                hoverBorderColor: '#000'
            }],

            labels: periodArray,
        },
        options:{
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                    }
                }]
            },

            legend:{
                position:'top',
                display:true,
            },

            layout:{
                padding: 0,
            }
        }
    });
</script>


<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/salesanalysis-script.js') }}"></script>
=======
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
<script src="{{ asset('js/tablesort.js') }}" type="text/javascript"></script>
@endsection
