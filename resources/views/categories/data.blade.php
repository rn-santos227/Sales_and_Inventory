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
		@forelse($categories as $category)
		<tr id="#category_{{$category->id}}">
			<td class="col_hide">{{$category->ref_code}}</td>
			<td>{{$category->name}}</td>
			<td>{{$category->active}}</td>
            <td class="action">
                <button class="btn btn-primary action btn_view" data-toggle="modal" data-target="#view" value="{{$category->id}}"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button>
                <button class="btn btn-warning action btn_fetch" data-toggle="modal" data-target="#update" value="{{$category->id}}"><i class="fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Edit</span></button>
            </td>		
        </tr>
		@empty
          <tr><td colspan="4"><p>No category Available</p></td></tr>
        @endforelse
	</tbody>
</table>
<div id="pagination">
<center>
	{!! $categories->render() !!}
</center>
</div>
