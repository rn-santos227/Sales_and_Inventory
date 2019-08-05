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
						<li><a href="/inventoryreports/inventoryvalue">Inventory Value</a></li>
						<li><a href="/inventoryreports/inventorylogs">Inventory Logs</a></li>
						<li class="active"><a href="/inventoryreports/inventorybeginning-ending">Beginning-Ending Inventory</a></li>
					</ul>

                    <br>

                    <form action="/inventoryreports/inventorybeginning-ending/search" method="post" class="form-inline">
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
                            <button class="btn btn-primary btn-md" type="submit"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                        </div>
                    </form>

                    <br>
                    <div class="row">
                    	<div class="col-md-6">
                    		<center>
                    			<label style="font-size: 10px;">BEGINNING INVENTORY</label>
                    		</center>
                    		
                    		<table id = "myTable" class="table table-hover">
								<thead>
									<tr>
									    <th>Reference Code</th>
									    <th>Name</th>
									    <th>Quantity</th>
									    <th>Cost</th>
									    <th>Price</th>
								    </tr>
							    </thead>
							    <tbody>
							    	@forelse($beginninginventory as $item)
							    	<tr>
	                                    <td>{{$item->ref_code}}</td>
	                                    <td>{{$item->name}}</td>
	                                    <td>{{$item->quantity}}</td>
	                                    <td>{{$item->cost}}</td>
	                                    <td>{{$item->price}}</td>
	                                </tr>
							    	@empty
							    	@endforelse
							    </tbody>
							</table>
                    	</div>

                    	<div class="col-md-6">
                    		<center>
                    			<label style="font-size: 10px;">ENDING INVENTORY</label>
                    		</center>

                    		<table id = "myTable" class="table table-hover">
								<thead>
									<tr>
									    <th>Reference Code</th>
									    <th>Name</th>
									    <th>Quantity</th>
									    <th>Cost</th>
									    <th>Price</th>
								    </tr>
							    </thead>
							    <tbody>
							    
							    </tbody>
							</table>
                    	</div>
                    </div>
				</div>
			</div>
		</div>
	</div>
@endsection

