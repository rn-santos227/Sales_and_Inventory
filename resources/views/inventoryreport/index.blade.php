@extends('admin.home')
@section('page')
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript">
</script>
	<div class="container-fluid">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Inventory Value</h3></div>
				<div class="panel-body">
						<div class="row">
							<div class="col-md-3">
								<label>Total Cost of Inventory:</label><br>
								<label>Total Retail Value of Inventory:</label>
							</div>
							<div class="col-md-6">
								<strong>Php {{$itemTotalCost}}</strong><br>
								<strong>Php {{$itemTotalValue}}</strong>
							</div>
					</div>
					<!-- <label>Total Cost of Inventory:</label> <strong>{{$itemTotalCost}}</strong><br>
					<label>Total Retail Value of Inventory:</label> <strong>{{$itemTotalValue}}</strong> -->
					<table id = "myTable" class="table table-hover">
						<thead>
							<tr>
								<th>ID</th>
							    <th>Item</th>
							    <th>Quantity</th>
							    <th>Cost</th>
							    <th>Price</th>
							    <th>Total Cost</th>
							    <th>Total Retail Value</th>
						    </tr>
					    </thead>
					    <tbody>
					    	@forelse($items as $item)
                            <tr>
                            	<td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{number_format($item->cost, 2, '.', ',')}}</td>
                                <td>{{number_format($item->price, 2, '.', ',')}}</td>
                                <td>{{number_format($item->quantity * $item->cost, 2, '.', ',')}}</td>
                                <td>{{number_format($item->quantity * $item->price, 2, '.', ',')}}</td>
                            </tr>        
                            @empty
                            @endforelse
					    </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection

