<table class="table table-bordered table-responsive" id="data">
	<thead>
		<tr>
			<th>Name</th>
			<th>Designation</th>
			<th class="col_hide">Status</th>
			<th class="action">Action</th>
		</tr>
	</thead>
	<tbody>
		@forelse($employees as $employee)
		<tr id="employee_{{$employee->id}}">
			<td>{{$employee->last_name . ', ' . $employee->first_name}}</td>
			<td>{{$employee->designation}}</td>
			<td class="col_hide">{{$employee->active}}</td>
            <td class="action">
                <button class="btn btn-primary action btn_view" data-toggle="modal" data-target="#view" value="{{$employee->id}}"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button>
                <button class="btn btn-warning action btn_fetch" data-toggle="modal" data-target="#update" value="{{$employee->id}}"><i class="fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Edit</span></button>
            </td>	
		</tr>

		@empty
          <tr><td colspan="5"><p>No Employee Available</p></td></tr>
        @endforelse
	</tbody>
</table>	
{!! $employees->render() !!}
