@extends('admin.home')

@section('page')
<<<<<<< HEAD
@if(Auth::user()->user_level == 'Administrator')
	<div class="container-fluid">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading"><h4><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</h4></div>
				<div class="panel-body">
				<div class="row">
					<div class="col-md-4">
=======
	<div class="container-fluid">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading"><h3><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</h3></div>
				<div class="panel-body">
				<div class="row">
					<div class="col-md-3">
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
						<div class="panel panel-default">
							<div class="panel-heading text-center">
								<i class="fa fa-calendar" aria-hidden="true"></i> {{\Carbon\Carbon::today()->format('F j, Y')}}
							</div>
						</div>	
					</div>
				</div>	
					<div class="row text-center">
<<<<<<< HEAD
						<div class="col-md-4">
	       					<div class="panel panel-default anim"  style="color: #ffffff; border-color: #ffffff;">
								<div class="panel-heading" style="background-color: #ff5d6f; border-color: #ff5d6f;">
									<h1 style="color: #ffffff; padding: 0px; margin: 5px;"><i class="fa fa-shopping-cart" aria-hidden="true"></i></h1>
									<p style="color: #ffffff; font-size: 13px; padding: 0px; margin: 0px;">₱ {{number_format($totalsales->sales)}}</p>
								</div>
	       						<div class="panel-footer" style="background-color: #614653;  border-color: #614653; font-size: 10px;  font-weight: bold;">
	       							TOTAL SALES
=======

						<div class="col-md-3">
	       					<div class="panel panel-default"  style="color: #ffffff; border-color: #ffffff;">
								<div class="panel-heading" style="background-color: #ff5d6f; border-color: #ff5d6f;">
									<h3 style="color: #ffffff;">₱ {{number_format($totalsales->sales)}}</h3>
								</div>
	       						<div class="panel-footer" style="background-color: #614653;  border-color: #614653;">
	       							Total Sales
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
	       						</div>					
	       					</div>        				
	        			</div>

<<<<<<< HEAD
	        			<div class="col-md-4">
	       					<div class="panel panel-default anim"  style="color: #ffffff; border-color: #ffffff;">
	       						<div class="panel-heading" style="background-color: #bc80ef; border-color: #bc80ef;">
	       							<h1 style="color: #ffffff; padding: 0px; margin: 5px;"><i class="fa fa-exchange" aria-hidden="true"></i></h1>
									<p style="color: #ffffff; font-size: 13px; padding: 0px; margin: 0px;">{{$transactions->trans}}</p>
	       						</div>
	       						<div class="panel-footer" style="background-color: #534d6c; border-color: #534d6c; font-size: 10px;  font-weight: bold;">
	       							TRANSACTIONS
=======
	        			<div class="col-md-3">
	       					<div class="panel panel-info"  style="color: #ffffff; border-color: #ffffff;">
	       						<div class="panel-heading" style="background-color: #bc80ef; border-color: #bc80ef;">
	       							<h3 style="color: #ffffff;">{{$transactions->trans}}</h3>
	       						</div>
	       						<div class="panel-footer" style="background-color: #534d6c; border-color: #534d6c;">
	       							Transactions
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
	       						</div>					
	       					</div>        				
	        			</div>	
						
<<<<<<< HEAD
						<div class="col-md-4">
	       					<div class="panel panel-warning anim"  style="color: #ffffff; border-color: #ffffff;">
	       						<div class="panel-heading" style="background-color: #49bbeb; border-color: #49bbeb;">
	       							<h1 style="color: #ffffff; padding: 0px; margin: 5px;"><i class="fa fa-money" aria-hidden="true"></i></h1>
									<p style="color: #ffffff; font-size: 13px; padding: 0px; margin: 0px;">₱ {{number_format($totalprofit->profit)}}</p>
	       						</div>
	       						<div class="panel-footer" style="background-color: #3c596c; border-color: #3c596c; font-size: 10px;  font-weight: bold;">
	       							GROSS PROFIT
=======
						<div class="col-md-3">
	       					<div class="panel panel-warning"  style="color: #ffffff; border-color: #ffffff;">
	       						<div class="panel-heading" style="background-color: #49bbeb; border-color: #49bbeb;">
	       							<h3 style="color: #ffffff;">₱ {{$transactions->trans}}</h3>
	       						</div>
	       						<div class="panel-footer" style="background-color: #3c596c; border-color: #3c596c;">
	       							Gross Profit
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
	       						</div>					
	       					</div>        				
	        			</div>

<<<<<<< HEAD
<!-- 	        			<div class="col-md-3">
	       					<div class="panel panel-danger anim" style="color: #ffffff; border-color: #ffffff;">
	       						<div class="panel-heading" style="background-color: #73d1be; border-color: #73d1be;">
	       							<h1 style="color: #ffffff; padding: 0px; margin: 5px;"><i class="fa fa-bath" aria-hidden="true"></i></h1>
									<p style="color: #ffffff; font-size: 13px; padding: 0px; margin: 0px;">₱ {{number_format($totalsales->sales)}}</p>
	       						</div>
	       						<div class="panel-footer" style="background-color: #455d63; border-color: #455d63; font-size: 10px;  font-weight: bold;">
	       							VAT SALES
	       						</div>					
	       					</div>        				
	        			</div>	 -->
					</div>

					<div class="row" style="padding-bottom: 2%;">
        				<div class="col-md-12">
		                	<canvas id="weeklySalesChart" style="height: 200px;"></canvas>
        				</div>

        				<div class="col-md-3 item_hide">
		                	<canvas id="voidedOrdersChart" style="height: 180px;"></canvas>
        				</div>
        			</div>

        			<div class="row text-center">
        				<div class="col-md-6">
        					<div class="panel panel-default">
        						<div class="panel-heading"><h4 style="font-size: 12px;  font-weight: bold;">TOP ITEMS BY SALES</h4></div>
								<div class="panel-body">
								<table class="table">
									<thead style="font-size: 10px;  font-weight: bold;">
										<th class="text-center">ITEM</th>
										<th class="text-center">QUANTITY</th>
										<th class="text-center">TOTAL</th>
									</thead>
									<tbody>

=======
	        			<div class="col-md-3">
	       					<div class="panel panel-danger"  style="color: #ffffff; border-color: #ffffff;">
	       						<div class="panel-heading" style="background-color: #73d1be; border-color: #73d1be;">
	       							<h3 style="color: #ffffff;">₱ {{$transactions->trans}}</h3>
	       						</div>
	       						<div class="panel-footer" style="background-color: #455d63; border-color: #455d63;">
	       							asdasd
	       						</div>					
	       					</div>        				
	        			</div>	
					</div>

        			<div class="row text-center">
        				<div class="col-md-6">
        					<div class="panel panel-default">
        						<div class="panel-heading"><h4>Top Items by Sales</h4></div>
								<div class="panel-body">
								<table class="table">
									<thead>
										<th class="text-center">Item</th>
										<th class="text-center">Qty</th>
										<th class="text-center">Total</th>
									</thead>
									<tbody>
									@forelse($solditems as $solditem) 
		                                <tr>
		                                	<td>{{$solditem->name}}</td>
		                                	<td>{{$solditem->qty}}</td>
		                                	<td>{{$solditem->subtotal}}</td>
		                                </tr>
			                        @empty
			                        @endforelse
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
									</tbody>
	        					</table>
	        					</div>
                            </div>
        				</div>

<<<<<<< HEAD
        				@if(App\SystemSetting::all()->first()->system_mode == 'Retailer')
        				<div class="col-md-6">
        					<div class="panel panel-default">
        						<div class="panel-heading"><h4 style="font-size: 12px;  font-weight: bold;">ITEMS AT CRITICAL LEVEL</h4></div>
								<div class="panel-body">
								<table class="table">
									<thead style="font-size: 10px;  font-weight: bold;"	>
										<th class="text-center">ITEM</th>
										<th class="text-center">QUANTITY</th>
									</thead>
									<tbody>
									@forelse($products as $product) 
				                        <tr>
				                            <td><a href="/inventory">{{$product->name}}</a></td>
				                            <td>{{$product->quantity}}</td>
				                        </tr>
				                    @empty
				                    @endforelse
=======
        				<div class="col-md-6">
        					<div class="panel panel-default">
        						<div class="panel-heading"><h4>Low Quantity Count Items</h4></div>
								<div class="panel-body">
								<table class="table">
									<thead>
										<th class="text-center">Item</th>
										<th class="text-center">Quantity</th>
									</thead>
									<tbody>
									@forelse($products as $product) 
		                                <tr>
		                                	<td>{{$product->name}}</td>
		                                	<td>{{$product->quantity}}</td>
		                                </tr>
			                        @empty
			                        @endforelse
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
									</tbody>
	        					</table>
	        					</div>
                            </div>
        				</div>
<<<<<<< HEAD
        				@endif
=======
        			</div>

        			<div class="row">
        				<div class="col-md-12">
		                	<canvas id="myChart"></canvas>
        				</div>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        			</div>
				</div>
			</div>
		</div>
	</div>

    <script src="{{ asset('js/Chart.min.js') }}"></script>

	<script>
<<<<<<< HEAD
		let weeklySalesChart = document.getElementById('weeklySalesChart').getContext('2d');
		let voidedOrdersChart = document.getElementById('voidedOrdersChart').getContext('2d');

		let barChart = new Chart(weeklySalesChart, {
			responsive: true,
			type:'bar',
			data:{
				labels:['MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY', 'SUNDAY'],
				datasets:[{
					label:'Sales',
					data:[
						{{$mondaysales}},
						{{$tuesdaysales}},
						{{$wednesdaysales}},
						{{$thursdaysales}},
						{{$fridaysales}},
						{{$saturdaysales}},
						{{$sundaysales}}
					],
					backgroundColor: 'rgba(73, 187, 235, 0.7)',
					hoverBorderWidth: 1,
=======
		let myChart = document.getElementById('myChart').getContext('2d');

		let massPopChart = new Chart(myChart, {
			responsive: true,
			type:'line',
			data:{
				labels:['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
				datasets:[{
					label:'Sales',
					data:[
						500,
						304,
						601,
						670,
						912,
						612,
						500
					],
					backgroundColor: 'rgba(129, 207, 238, 1)',
					borderWidth: 1,
					borderColor: '#000',
					hoverBorderWidth: 3,
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
					hoverBorderColor: '#000'
				}]
			},
			options:{
<<<<<<< HEAD
				maintainAspectRatio: false,
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
				scales: {
			        yAxes: [{
			            ticks: {
			                beginAtZero: true,
			            }
			        }]
			    },

				title:{
					display: true,
<<<<<<< HEAD
					text: 'DAILY SALES',
					fontSize: 10
=======
					text: 'Weekly Sales',
					fontSize: 25
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
				},

				legend:{
					position:'bottom',
					display:false,
				},

				layout:{
<<<<<<< HEAD
					padding: 0,
				}
			}
		});

		let doughnutChart = new Chart(voidedOrdersChart, {
			responsive: true,
			type:'doughnut',
			data:{
				labels:['Successful Orders', 'Voided Orders'],
				datasets:[{
					label:'Count',
					data:[
						500,
						18
					],
					backgroundColor: [
						'rgba(115, 209, 190, 1)',
						'rgba(69, 93, 99, 1)',
					],
					borderWidth: 0,
					hoverBorderWidth: 1,
					hoverBorderColor: 'rgba(69, 93, 99, 1)'
				}]
			},
			options:{
				maintainAspectRatio: false,

				title:{
					display: true,
					text: 'SUCCESSFUL ORDERS',
					fontSize: 10
				},

				legend:{
					position:'bottom',
					display:false,
				},
			}
		});
	</script>
@endif
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
=======
					padding: 50,
				}
			}
		});
	</script>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
@endsection

