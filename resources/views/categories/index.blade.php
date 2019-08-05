@extends('admin.home')
@section('page')
	<div class="container-fluid">
		<div class="row">
			<div class="panel panel-default">
<<<<<<< HEAD
				<div class="panel-heading"><h4><i class="fa fa-tags" aria-hidden="true"></i> Categories</h4></div>
				<div class="panel-body">
					<!-- Search Panel -->
					<div class="panel search">
						<form>
							<div class="panel-body">
								<div class="input-group">
									<input id="txt_search" type="text" name="search" class="form-control" placeholder="Search For..." value="{{ old('search') }}">
				          		  	<span class="input-group-btn">
				            			<button class="btn btn-primary btn_search" type="button">
=======
				<div class="panel-heading"><h3><i class="fa fa-tags" aria-hidden="true"></i> Categories</h3></div>
				<div class="panel-body">
					<!-- Search Panel -->
					<div class="panel search">
						<form method="GET" action="\categories">
							<div class="panel-body">
								<div class="input-group">
									<input type="text" name="search" class="form-control" placeholder="Search for..." value="{{ old('search') }}">
				          		  	<span class="input-group-btn">
				            			<button class="btn btn-primary" type="submit">
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
				            				<i class="fa fa-search" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Search</span>
				               			</button>
				                		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
				                  			<i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span> <span class="hidden-xs hidden-sm"> New Category</span>
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
<<<<<<< HEAD
										<span class="input-group-addon" id="sizing-addon2"><i class="fa fa-tags" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">&nbsp;&nbsp;&nbsp;Search By</span></span>
		              					<select id="cbo_tag" class="form-control" aria-describedby="sizing-addon2" name="tag">
=======
											<span class="input-group-addon" id="sizing-addon2"><i class="fa fa-tags" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">&nbsp;&nbsp;&nbsp;Search By</span></span>
		              					<select class="form-control" aria-describedby="sizing-addon2" name="tag">
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
		             						<option value="id">ID Number</option>
		                					<option value="ref_code">Category Code</option>
		           					  	  	<option value="name">Category Name</option>
		           					  	  	<option value="description">Category Description</option>
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
<<<<<<< HEAD
					<a href="{{ route('categories/pdf',['download'=>'pdf']) }}" class="pull-left"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>&nbsp;
                    <a href="fileentry/dload/phpD0BF.tmp.xlsx"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Download Excel Template</a>
					<div id="product_container">
					<!-- Category Table -->
					@include('categories.data')
					</div>
=======
					<!-- Category Table -->
					<table class="table table-bordered table-responsive">
						<thread>
							<tr>
								<th class="col_hide">Reference Code</th>
								<th>Name</th>
								<th>Status</th>
								<th class="action">Action</th>
							</tr>
						</thread>
						<tbody>
							@forelse($categories as $category)
							<tr>
								<td class="col_hide">{{$category->ref_code}}</td>
								<td>{{$category->name}}</td>
								<td>{{$category->active}}</td>
								<td class="action">
									<button class="btn btn-primary action"  data-toggle="modal" data-target="#view{{$category->id}}"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button>
                                    <button class="btn btn-warning action"  data-toggle="modal" data-target="#update{{$category->id}}"><i class="fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Edit</span></button>
								</td>
							</tr>

							@empty
                              <tr><td colspan="4"><p>No category Available</p></td></tr>

                            @endforelse
						</tbody>
					</table>
					<center>
						{{ $categories->links() }}
					</center>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
				</div>
			</div>
		</div>
	</div>

<<<<<<< HEAD
<!-- Child Views -->
@include('categories.create')
@include('categories.view')
@include('categories.update')
@include('categories.download')

<!-- Dialog Messages -->
@include('dialogs.info')
@include('dialogs.success')
@include('dialogs.error')

<!-- Batch Upload -->
@include('batch.batch')

<!-- JavaScript Scripts -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/category-script.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/crud-script.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pagination.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/batch-script.js') }}" type="text/javascript"></script>
=======
<!-- Attachment of the Modals. -->
@include('categories.create')
@include('categories.view')
@include('categories.update')

>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
@endsection

