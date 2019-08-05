@extends('admin.home')

@section('page')
<div class="container-fluid">
    <div class="row">
            <div class="panel panel-default">
<<<<<<< HEAD
                <div class="panel-heading"><h4><i class="fa fa-truck" aria-hidden="true"></i> Suppliers</h4></div>
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
                                            <i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span> <span class="hidden-xs hidden-sm"> New Supplier</span>
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
                                            <option value="ref_code">Supplier Code</option>
                                            <option value="name">Supplier Name</option>
                                            <option value="description">Supplier Description</option>
                                        </select>
                                    </div>
                                </div>      
                                
                                <div class="form-group">           
                                    <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-list" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">&nbsp;&nbsp;&nbsp;Sort By</span></span>
                                        <select class="form-control" aria-describedby="sizing-addon2">
                                            <option value="id">ID</option>
                                            <option value="ref_code">Reference Code</option>
                                            <option value="name">Name</option>
                                            <option value="description">Status</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <a href="{{ route('suppliers/pdf',['download'=>'pdf']) }}" class="pull-left"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>                    
                    <div id="product_container">&nbsp;
                        <a href="fileentry/dload/php21E1.tmp.xlsx"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Download Excel Template</a>
                        @include('suppliers.data')
                    </div>
=======
                <div class="panel-heading"><h3><i class="fa fa-truck" aria-hidden="true"></i> Suppliers</h3></div>
                <div class="panel-body">
                    <!-- Search Panel -->
                    <div class="panel search">
                        <div class="panel-body">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Search</span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
                                        <i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span> <span class="hidden-xs hidden-sm"> New Supplier</span>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="panel-footer" id="accordion" style="padding-left: 30px; padding-right: 30px; "> 
                            <form class="form-horizontal">
                                <div class="form-group">           
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-tags" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">&nbsp;&nbsp;&nbsp;Search By</span></span>
                                        <select class="form-control" aria-describedby="sizing-addon2">
                                            <option>ID Number</option>
                                            <option>Product Name</option>
                                            <option>Product Code</option>
                                            <option>Product Category</option>
                                            <option>Product Supplier</option>
                                            <option>Product Description</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                            <form class="form-horizontal">
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
                                            <option>Price</option>
                                            <option>User Added</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th class="col_hide">Reference Code</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($suppliers as $supplier)
                            <tr>
                                <td class="col_hide">{{$supplier->ref_code}}</td>
                                <td>{{$supplier->name}}</td>
                                <td>{{$supplier->active}}</td>
                                <td  class="action">
                                    <button class="btn btn-primary action"  data-toggle="modal" data-target="#view{{$supplier->id}}"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button>
                                    <button class="btn btn-warning action"  data-toggle="modal" data-target="#update{{$supplier->id}}"><i class="fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Edit</span></button>
                                </td>
                            </tr>        
                            @empty
                              <tr><td colspan="4"><td><p>No supplier Available</p></td></tr>
                            @endforelse
                        </tbody>
                    </table>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                    <center>
                        {{$suppliers->links()}}
                    </center>
                </div>
            </div>
        </div>
</div>
<!-- Child Views -->
@include('suppliers.create')
@include('suppliers.view')
@include('suppliers.update')

<!-- Dialog Messages -->
@include('dialogs.info')
@include('dialogs.success')
@include('dialogs.error')

<!-- Batch Upload -->
@include('batch.batch')

<!-- JavaScript Scripts -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/supplier-script.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/crud-script.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pagination.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/batch-script.js') }}" type="text/javascript"></script>

@endsection
