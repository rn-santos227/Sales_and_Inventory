<table class="table table-bordered table-responsive" id="data">
    <thead>
        <tr>
            <th class="col_hide">Reference Code</th>
            <th>Name</th>
<<<<<<< HEAD
			<th>Active</th>
            <th>Action</th>
=======
            <th>Quantity</th>
            <th>Price</th>
			<th>Active</th>
            <th class="col_hide">Action</th>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        </tr>
    </thead>
    <tbody>
		@forelse($items as $item)
        <tr id="item_{{$item->id}}">
            <td class="col_hide">{{$item->ref_code}}</td>
            <td>{{$item->name}}</td>
<<<<<<< HEAD
         	<td>{{$item->active}}</td>
=======
            <td>{{$item->quantity}}</td>
            <td>{{$item->price}}</td>
         	<td class="col_hide">{{$item->active}}</td>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
            <td class="action">
                <button class="btn btn-primary action btn_view" data-toggle="modal" data-target="#view" value="{{$item->id}}"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button>
                <button class="btn btn-warning action btn_fetch" data-toggle="modal" data-target="#update" value="{{$item->id}}"><i class="fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Edit</span></button>
            </td>
        </tr>        
    @empty
<<<<<<< HEAD
      <tr><td colspan="4"><p>No Product Available</p></td></tr>
    @endforelse
	</tbody>
</table>
{!! $items->render() !!}
=======
      <tr><td colspan="6"><p>No Product Available</p></td></tr>
    @endforelse
	</tbody>
</table>
<div id="pagination">
<center>
    {!! $items->links() !!}
</center>
</div>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
