@extends('admin.home')
@section('page')
<div class="container-fluid">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading"><h4><i class="fa fa-star" aria-hidden="true"></i> Promos</h4></div>
			<div class="panel-body">
				<!-- Search Panel -->
				<div class="panel search">
					<form>
						<div class="panel-body">
							<div class="input-group">
								<input id="txt_search" type="text" name="search" class="form-control" placeholder="Search For..." value="{{ old('search') }}">
			          		  	<span class="input-group-btn">
			            			<button class="btn btn-primary btn_search" type="button">
			            				<i class="fa fa-search" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Search</span>
			               			</button>
			                		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
			                  			<i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span> <span class="hidden-xs hidden-sm"> New Promo</span>
			                		</button>
			                		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#batch">
                                        <i class="fa fa-upload" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Import </span>
                                    </button>
			              		</span>
		              		</div>
						</div>
						<div class="panel-footer" id="accordion" style="padding-left: 30px; padding-right: 30px; ">  							
							<div class="form-group">           
	        					<div class="input-group">
									<span class="input-group-addon" id="sizing-addon2"><i class="fa fa-tags" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">&nbsp;&nbsp;&nbsp;Search By</span></span>
	              					<select id="cbo_tag" class="form-control" aria-describedby="sizing-addon2" name="tag">
	             						<option value="id">ID Number</option>
	                					<option value="ref_code">Promo Code</option>
	           					  	  	<option value="name">Promo Name</option>
	           					  	  	<option value="description">Promo Description</option>
	              					</select>
	          					</div>
	          				</div>		
							
							<div class="form-group">           
	        					<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2"><i class="fa fa-list" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">&nbsp;&nbsp;&nbsp;Sort By</span></span>
	              					<select class="form-control" aria-describedby="sizing-addon2">
										<option>ID</option>
	                					<option>Reference Code</option>
	           					  	  	<option>Name</option>
	           					  	  	<option>Status</option>
	              					</select>
	          					</div>
	          				</div>
						</div>
					</form>
				</div>
				<a href="{{ route('promos/pdf',['download'=>'pdf']) }}" class="pull-left"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>&nbsp;
                    <a href="fileentry/dload/php85C0.tmp.xlsx"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Download Excel Template</a>
				<div id="product_container">
				<!-- promos Table -->
				@include('promos.data')
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Child Views -->
@include('promos.create')
@include('promos.view')
@include('promos.update')

<!-- Dialog Messages -->
@include('dialogs.info')
@include('dialogs.success')
@include('dialogs.error')

<!-- Batch Upload -->
@include('batch.batch')

<!-- JavaScript Scripts -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/promo-script.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/crud-script.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pagination.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/batch-script.js') }}" type="text/javascript"></script>

@endsection

