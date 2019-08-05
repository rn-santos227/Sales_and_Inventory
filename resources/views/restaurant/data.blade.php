<table class="table table-bordered table-responsive" id="table_list">
    <thead>
        <tr>
            <th class="col_hide">Receipt Number</th>
            <th>Table Name</th>
            <th class="col_hide">Customer Name</th>
<<<<<<< HEAD
            <th class="mobile">Status</th>
=======
            <th>Orders</th>
            <th>Status</th>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
			<th>Action</th>
        </tr>
    </thead>
    <tbody>
<<<<<<< HEAD
    @foreach($occupied as $table)
        <tr id="table_{{$table->id}}">
            <td id="table_receipt{{$table->id}}" class="col_hide">{{$table->receipt->id}}</td>  
            <td id="table_name{{$table->id}}">{{$table->name}}</td>
            <td style="text-transform: capitalize;" id="table_customer{{$table->id}}" class="col_hide">{{$table->customer}}</td>            
            <td style="text-transform: capitalize;" id="table_status{{$table->id}}" class="mobile">{{$table->status}}</td>
            <td style="width: 180px;">
                <button class="btn btn-primary action-restaurant btn_order" data-toggle="modal" data-target="#orders" value="{{$table->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></button> 
                <button class="btn btn-success action-restaurant btn_cashier" data-toggle="modal" value="{{$table->id}}"><i class="fa fa-money" aria-hidden="true"></i></button> <button class="btn btn-danger action-restaurant btn_remove" value="{{$table->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
            </td>
        </tr>
    @endforeach
=======
    @forelse($o_tables as $table)
        <tr id="table_id{{$table->id}}">
            <td></td>
        </tr>
    @empty
        <tr>
            <td colspan="6">No Occupied Tables</td>
        </tr>
    @endforelse
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
	</tbody>
</table>