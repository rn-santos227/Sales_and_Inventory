<table class="table table-bordered table-responsive" id="data">
    <thead>
        <tr>
            <th class="col_hide">Reference Code</th>
            <th>Name</th>
            <th>Type</th>
			<th class="col_hide">Active</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
		@forelse($promos as $promo)
        <tr id="promo_{{$promo->id}}">
            <td class="col_hide">{{$promo->ref_code}}</td>
            <td>{{$promo->name}}</td>
         	<td>{{$promo->type}}</td>
            <td class="col_hide">{{$promo->active}}</td>
            <td class="action">
                <button class="btn btn-primary action btn_view" data-toggle="modal" data-target="#view" value="{{$promo->id}}"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button>
                <button class="btn btn-warning action btn_fetch" data-toggle="modal" data-target="#update" value="{{$promo->id}}"><i class="fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Edit</span></button>
            </td>
        </tr>        
    @empty
      <tr><td colspan="5"><p>No Promos Available</p></td></tr>
    @endforelse
	</tbody>
</table>
{!! $promos->render() !!}