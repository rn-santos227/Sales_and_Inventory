@extends('admin.home')

@section('page')
	<div class="container-fluid">
		<div class="row">
			<div class="panel panel-default">
<<<<<<< HEAD
				<div class="panel-heading"><h4><i class="fa fa-clone" aria-hidden="true"></i> Menus</h4></div>
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
                                            <i class="fa fa-plus-square" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> New Item </span>
                                        </button>
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#batch">
                                            <i class="fa fa-upload" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Import </span>
                                        </button>
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#download">
                                            <i class="fa fa-download" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Export </span>
=======
				<div class="panel-heading"><h3><i class="fa fa-clone" aria-hidden="true"></i> Menus</h3></div>
				<div class="panel-body">
                    <!-- Search Panel -->
					<div class="panel search">
                        <form method="GET" action="\menus">
                            <div class="panel-body">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for..." name="search" value="{{ old('search') }}">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-search" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Search</span>
                                        </button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
                                            <i class="fa fa-plus-square fa-lg" aria-hidden="true"></i> <span class="hidden-xs hidden-sm"> New Menu</span>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <div class="panel-footer" id="accordion" style="padding-left: 30px; padding-right: 30px; "> 
                                <div class="form-group">           
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-tags" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">&nbsp;&nbsp;&nbsp;Search By</span></span>
<<<<<<< HEAD
                                        <select id="cbo_tag" class="form-control" aria-describedby="sizing-addon2" name="tag">
=======
                                        <select class="form-control" aria-describedby="sizing-addon2" name="tag">
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                                            <option value="id">ID Number</option>
                                            <option value="name">Menu Name</option>
                                            <option value="ref_code">Menu Code</option>
                                            <option value="category">Menu Category</option>
                                            <option value="description">Menu Description</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">           
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-list" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">&nbsp;&nbsp;&nbsp;Sort By</span></span>
                                        <select class="form-control" aria-describedby="sizing-addon2">
<<<<<<< HEAD
                                            <option value="id">ID Number</option>
                                            <option value="name">Menu Name</option>
                                            <option value="ref_code">Menu Code</option>
                                            <option value="category">Menu Category</option>
                                            <option value="description">Menu Description</option>
                                            <option>Date Added</option>
                                            <option>Last Update</option>
                                            <option>Cost</option>
=======
                                            <option>ID Number</option>
                                            <option>Product Name</option>
                                            <option>Product Code</option>
                                            <option>Product Category</option>
                                            <option>Product Supplier</option>
                                            <option>Date Added</option>
                                            <option>Last Update</option>
                                            <option>Quantity</option>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
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
                       <a href="{{ route('menus/pdf',['download'=>'pdf']) }}" class="pull-left"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>&nbsp;
                        <a href="fileentry/dload/php9B9B.tmp.xlsx"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Download Excel Template</a>
=======
                       <a href="{{ route('menus/pdf',['download'=>'pdf']) }}" class="pull-left"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                       @include('menus.data');
                   </div>
				</div>
			</div>
		</div>
	</div>

<<<<<<< HEAD
<!-- Child Views -->
@include('menus.create')
@include('menus.view')
@include('menus.update')
@include('menus.download')

<!-- Dialog Messages -->
@include('dialogs.info')
@include('dialogs.error')
@include('dialogs.success')

<!-- Batch Dialog -->
@include('batch.batch')

<!-- JavaScript Scripts -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/menu-script.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/crud-script.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pagination.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/batch-script.js') }}" type="text/javascript"></script>
=======
@include('menus.create')
<script src="{{ asset('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pagination.js') }}" type="text/javascript"></script>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
@endsection

