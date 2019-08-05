<table class="table table-bordered table-responsive" id="data">
	<thead>
		<tr>
			<th class="col_hide">Reference Code</th>
			<th>Name</th>
			<th>Status</th>
			<th class="action">Action</th>
		</tr>
	</thead>
	<tbody>
		@forelse($tables as $table)
		<tr id="#table_{{$table->id}}">
			<td class="col_hide">{{$table->ref_code}}</td>
			<td>{{$table->name}}</td>
			<td>{{$table->active}}</td>
            <td class="action">
                <button class="btn btn-primary action btn_view" data-toggle="modal" data-target="#view" value="{{$table->id}}"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button>
                <button class="btn btn-warning action btn_fetch" data-toggle="modal" data-target="#update" value="{{$table->id}}"><i class="fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Edit</span></button>
            </td>		
        </tr>
		@empty
          <tr><td colspan="4"><p>No table Available</p></td></tr>
        @endforelse
	</tbody>
</table>
{!! $tables->render() !!}