@extends('admin.home')

@section('page')
	<div class="container-fluid">
		<div class="row">
			<div class="panel panel-default">
<<<<<<< HEAD
				<div class="panel-heading"><h4><i class="fa fa-cube" aria-hidden="true"></i> Products</h4></div>
				<div class="panel-body">
					<!-- Search Panel -->
					<div class="panel search">
						<form>
						{{ csrf_field() }}
=======
				<div class="panel-heading"><h3><i class="fa fa-cube" aria-hidden="true"></i> Products</h3></div>
				<div class="panel-body">
					<!-- Search Panel -->
					<div class="panel search">
						<form method="GET" action="\items">
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
							<div class="panel-body">
								<div class="input-group">
									<input id="txt_search" type="text" name="search" class="form-control" placeholder="Search For..." value="{{ old('search') }}">
				          		  	<span class="input-group-btn">
				            			<button class="btn btn-primary btn_search" type="button">
				            				<i class="fa fa-search" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Search</span>
				               			</button>
				                		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
				                  			<i class="fa fa-plus-square fa-lg" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> New Item </span>
				                		</button>
<<<<<<< HEAD
				                		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#batch">
                                            <i class="fa fa-upload" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Import </span>
                                        </button>
                                       	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#download">
                                            <i class="fa fa-download" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Export </span>
                                        </button>
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
				              		</span>
			              		</div>
							</div>
							<div class="panel-footer" id="accordion" style="padding-left: 30px; padding-right: 30px; "> 
 								<div class="form-group">           
                					<div class="input-group">
	 									<span class="input-group-addon" id="sizing-addon2"><i class="fa fa-tags" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">&nbsp;&nbsp;&nbsp;Search By</span></span>
	                  					<select id="cbo_tag" class="form-control" aria-describedby="sizing-addon2" name="tag">
	                 						<option value="id">ID Number</option>
	               					  	  	<option value="name">Product Name</option>
	                    					<option value="ref_code">Product Code</option>
	                    					<option value="category">Product Category</option>
	                    					<option value="supplier">Product Supplier</option>
	                    					<option value="description">Product Description</option>
	                  					</select>
                  					</div>
                  				</div>
 								<div class="form-group">           
                					<div class="input-group">
	 									<span class="input-group-addon" id="sizing-addon2"><i class="fa fa-list" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">&nbsp;&nbsp;&nbsp;Sort By</span></span>
	                  					<select class="form-control" aria-describedby="sizing-addon2">
											<option>ID Number</option>
											<option>Product Name</option>
											<option>Product Code</option>
											<option>Product Category</option>
											<option>Product Supplier</option>
											<option>Date Added</option>
											<option>Last Update</option>
											<option>Quantity</option>
											<option>Cost</option>
											<option>Price</option>
											<option>User Added</option>
	                  					</select>
                  					</div>
                  				</div>
							</div>
						</form>
					</div>
					<div id="product_container">
<<<<<<< HEAD
						<a href="{{ route('items/pdf',['download'=>'pdf']) }}" class="pull-left"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>&nbsp;
						<a href="fileentry/dload/php101D.tmp.xlsx"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Download Excel Template</a>
=======
						<a href="{{ route('items/pdf',['download'=>'pdf']) }}" class="pull-left"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
						@include('items.data')	
					</div>				
				</div>
			</div>
		</div>
	</div>
	
<!-- Child Views -->	
@include('items.create')
@include('items.view')
@include('items.update')
<<<<<<< HEAD
@include('items.download')
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

<!-- Dialog Messages -->
@include('dialogs.info')
@include('dialogs.success')
<<<<<<< HEAD
@include('dialogs.error')

<!-- Batch Dialog -->
@include('batch.batch')
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

<!-- JavaScript Scripts -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/item-script.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/crud-script.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pagination.js') }}" type="text/javascript"></script>
<<<<<<< HEAD
<script src="{{ asset('js/batch-script.js') }}" type="text/javascript"></script>
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
@endsection