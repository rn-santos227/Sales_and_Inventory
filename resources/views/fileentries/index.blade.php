@extends('admin.home')

@section('page')
<div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					File Entries	
				</div>
				<div class="panel-body">
					@if(Auth::user()->user_level == 'Administrator')
					<form action="fileentry/add" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<input type="file" name="filefield">
						<input type="submit">
					</form>
					@endif
					@foreach($entries as $entry)
						<a href="fileentry/dload/{{$entry->filename}}">{{$entry->original_filename}}</a><br>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


