<table class="table table-bordered table-responsive" id="data">
	<thead>
		<tr>
			<th class="col_hide">Reference Code</th>
			<th>Name</th>
			<th>Rate</th>
			<th class="col_hide">Status</th>
			<th class="action">Action</th>
		</tr>
	</thead>
	<tbody>
		@forelse($discounts as $discount)
		<tr id="discount_{{$discount->id}}">
			<td class="col_hide">{{$discount->ref_code}}</td>
			<td>{{$discount->name}}</td>
			<td>{{$discount->rate}}</td>
			<td class="col_hide">{{$discount->active}}</td>
            <td class="action">
                <button class="btn btn-primary action btn_view" data-toggle="modal" data-target="#view" value="{{$discount->id}}"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button>
                <button class="btn btn-warning action btn_fetch" data-toggle="modal" data-target="#update" value="{{$discount->id}}"><i class="fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Edit</span></button>
            </td>	
		</tr>

		@empty
          <tr><td colspan="5"><p>No discount Available</p></td></tr>
        @endforelse
	</tbody>
</table>	
{!! $discounts->render() !!}
