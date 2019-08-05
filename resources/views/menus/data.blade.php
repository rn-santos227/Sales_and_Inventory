<<<<<<< HEAD
<table class="table table-bordered table-responsive" id="data">
=======
<table class="table table-bordered table-responsive">
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
	<thead>
		<tr>
			<th class="col_hide">Reference Code</th>
			<th>Name</th>
            <th>Price</th>
			<th class="col_hide">Status</th>
			<th class="action">Action</th>
		</tr>
	</thead>
	<tbody>
		@forelse($menus as $menu)
<<<<<<< HEAD
			<tr id="menu_{{$menu->id}}">
=======
			<tr>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
				<td class="col_hide">{{$menu->ref_code}}</td>
				<td>{{$menu->name}}</td>
                <td>{{$menu->price}}</td>
				<td class="col_hide">{{$menu->active}}</td>
<<<<<<< HEAD
	            <td class="action">
	                <button class="btn btn-primary action btn_view" data-toggle="modal" data-target="#view" value="{{$menu->id}}"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button>
	                <button class="btn btn-warning action btn_fetch" data-toggle="modal" data-target="#update" value="{{$menu->id}}"><i class="fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Edit</span></button>
	            </td>
			</tr>
=======
				<td class="action">
					<button class="btn btn-primary action" data-toggle="modal" data-target="#view{{$menu->id}}"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button>
                    <button class="btn btn-warning action" data-toggle="modal" data-target="#update{{$menu->id}}"><i class="fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Edit</span></button>
				</td>
			</tr>

>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
		@empty
            <tr><td colspan="5"><p>No menu Available</p></td></tr>
        @endforelse
	</tbody>
</table>
<<<<<<< HEAD
{{ $menus->render() }}
=======
<center>
    {{ $menus->links() }}
</center>

@include('menus.view')
@include('menus.update')
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
