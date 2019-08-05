<table class="table table-bordered table-responsive" id="data">
    <thead>
        <tr>
            <th class="col_hide">Reference Code</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($suppliers as $supplier)
        <tr>
            <td class="col_hide">{{$supplier->ref_code}}</td>
            <td>{{$supplier->name}}</td>
            <td>{{$supplier->contact}}</td>
            <td>{{$supplier->active}}</td>
            <td  class="action">
                <button class="btn btn-primary action btn_view" data-toggle="modal" data-target="#view" value="{{$supplier->id}}"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button>
                <button class="btn btn-warning action btn_fetch" data-toggle="modal" data-target="#update" value="{{$supplier->id}}"><i class="fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Edit</span></button>
            </td>
        </tr>        
        @empty
          <tr><td colspan="5"><td><p>No supplier Available</p></td></tr>
        @endforelse
    </tbody>
</table>    