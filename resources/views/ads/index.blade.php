@extends('admin.home')
@section('page')
<div class="container-fluid">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading"><h4><i class="fa fa-history" aria-hidden="true"></i> Advertisments</h4></div>
			<div class="panel-body">
                <label>New Image</label>
                <form id = "frm_new" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <div class="input-group" style="width: 40%">
                        <input type="file" class="btn btn-info form-control" name="image" id="image" value="{{ old('image') }}">
                        <span class="input-group-btn">
                        <button class='btn btn-sm btn-success form-control' id="new_add"><i class="fa fa-plus" aria-hidden="true"></i> Submit </button>
                        </span>
                    </div><br>
                </form>
				<table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ads as $item)
                        <tr>
                            <td><img src="{{$item->image}}" width="30px" height="30px">&nbsp;{{$item->image}}</td>
                            <td>
                                <button class='btn btn-sm btn-danger pull-right delete_ad' id="{{$item->id}}"'><i class="fa fa-trash" aria-hidden="true"></i> Delete </button>
                                <!-- <button class='btn btn-sm btn-primary pull-right' style="margin-right: 5px;" id="{{$item->id}}"><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit </button> -->
                            </td>
                        </tr>        
                        @empty
                        @endforelse
                    </tbody>
                </table>
			</div>
		</div>
	</div>
</div>
<script src="{{ asset('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/ad-script.js') }}" type="text/javascript"></script>
@endsection