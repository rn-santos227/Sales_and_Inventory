@extends('admin.home')
@section('page')
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript">
</script>
	<div class="container-fluid">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading"><h4><i class="fa fa-archive" aria-hidden="true"></i> Inventory Reports</h4></div>
				<div class="panel-body">
					<ul class="nav nav-tabs">
						<li class="active"><a href="/inventoryreports/inventoryvalue">Inventory Value</a></li>
						<li><a href="/inventoryreports/inventorylogs">Inventory Logs</a></li>
						<li><a href="/inventoryreports/inventorybeginning-ending">Beginning-Ending Inventory</a></li>
					</ul>

                    <br>

                    <!-- <form action="#" method="post" class="form-inline">
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

                    <br> -->
                    <a href="{{ route('inventoryreports/inventoryvalue/pdf',['download'=>'pdf']) }}" class="pull-left"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>
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

					<div class="row">
						<div class="col-md-3">
							<label>Total Cost of Inventory:</label><br>
							<label>Total Retail Value of Inventory:</label>
						</div>
						<div class="col-md-6">
							<strong>₱ {{$itemTotalCost}}</strong><br>
							<strong>₱ {{$itemTotalValue}}</strong>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/tablesort.js') }}" type="text/javascript"></script>
@endsection

