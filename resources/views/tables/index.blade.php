@extends('admin.home')

@section('page')
<div class="container-fluid">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h4><i class="fa fa-cutlery" aria-hidden="true"></i> Table</h4></div>
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
                                        <i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span> <span class="hidden-xs hidden-sm"> New Table</span>
                                    </button>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#batch">
                                        <i class="fa fa-upload" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Import </span>
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
                                            <option value="id">ID Number</option>
                                            <option value="name">Table Name</option>
                                            <option value="ref_code">Table Code</option>
                                            <option value="description">Table Description</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                            <form class="form-horizontal">
                                <div class="form-group">           
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-list" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">&nbsp;&nbsp;&nbsp;Sort By</span></span>
                                        <select class="form-control" aria-describedby="sizing-addon2">
                                            <option value="id">ID Number</option>
                                            <option value="name">Table Name</option>
                                            <option value="ref_code">Table Code</option>
                                            <option value="description">Table Description<</option>
                                            <option value="create_at">Create 
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <a href="{{ route('tables/pdf',['download'=>'pdf']) }}" class="pull-left"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>&nbsp;
                    <a href="fileentry/dload/php43F1.tmp.xlsx"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Download Excel Template</a>
                    <div id="product_container">
                        @include('tables.data')
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- Child Views -->
@include('tables.create')
@include('tables.view')
@include('tables.update')

<!-- Dialog Messages -->
@include('dialogs.info')
@include('dialogs.success')
@include('dialogs.error')

<!-- Batch Account -->
@include('batch.batch')

<!-- JavaScript Scripts -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/table-script.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/crud-script.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pagination.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/batch-script.js') }}" type="text/javascript"></script>

@endsection
