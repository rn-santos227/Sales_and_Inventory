@extends('admin.home')

@section('page')
<div class="container-fluid">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading"><h4><i class="fa fa-clipboard" aria-hidden="true"></i> Attendance</h4></div>
			<div class="panel-body">
				<table class="table table-bordered table-responsive" id="data">
					<thead>
						<tr>
							<th>Employee Name</th>
							<th>Employee Designation</th>
				            <th>Attendance</th>
						</tr>
					</thead>
					<tbody>
					@forelse($employees as $employee)
						<tr id="employee_{{$employee->id}}">
							<td>{{$employee->last_name . ', ' . $employee->first_name}}</td>
							<td>{{$employee->designation}}</td>
							<td align="center">
								<label class="switch">
									<input id="{{$employee->id}}" val="{{$employee->present}}" class="set-attendance" type="checkbox" {{ $employee->present == 1 ? 'checked' : '' }}>
									<span class="slider"></span>
								</label>
							</td>
						</tr>
					@empty
			            <tr><td colspan="3"><p>No Employee is active.</p></td></tr>
			        @endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>



<script src="{{ asset('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/attendance-script.js') }}" type="text/javascript"></script>
@endsection