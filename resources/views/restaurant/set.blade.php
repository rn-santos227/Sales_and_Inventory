<form class="form-horizontal" >
	<div class="panel-body">
		<div class="form-group">
	        <label for="receipt_id" class="col-md-2 control-label">Receipt Number: </label>
	        <div class="col-md-8">
	            <input id="set-receipt_id" type="text" class="form-control" name="receipt_id" readonly style="background-color:#ffffff;" value={{$receipt_id}}>
	        </div>
        </div>

		<div class="form-group">
			<label for="subtotal" class="col-md-2 control-label">Customer Name</label>
			<div class="col-md-8">
				<input id="set-customer" type="text" class="form-control" name="customer_name" required autofocus list="names">
                <strong id="set-customer_message" style="color:#FF0000;"></strong>
                <datalist id="names">
                    @foreach($customers as $customer)
                    <option value="{{$customer->name}}">{{$customer->id}} {{$customer->email}}</option>
                    @endforeach
                </datalist>
            </div>
        </div>

        <div class="form-group">
       		<label for="subtotal" class="col-md-2 control-label">Table Name</label>
       		<div class="col-md-8">
                <select class="form-control" id="set-table_id" name="table_id" required>
                	@forelse($vacant as $table)
                	<option value="{{$table->id}}">{{$table->name}} ({{$table->description}})</option>
                    @empty
                    <option value="0">No Available</option>
                	@endforelse
                </select>
                <strong id="set-table_id_message" style="color:#FF0000;"></strong>
        	</div>
        </div>

        <div class="form-group">
            <label for="subtotal" class="col-md-2 control-label">Attendant</label>
            <div class="col-md-8">
                <select class="form-control" id="set-employee_id" name="employee_id" required>
                    @forelse($employees as $employee)
                    <option value="{{$employee->id}}">{{$employee->last_name . ', ' . $employee->first_name}}</option>
                    @empty
                    <option value="0">No Available</option>
                    @endforelse
                </select>
                <strong id="set-employee_id_message" style="color:#FF0000;"></strong>
            </div>
        </div>


	</div>
	<div class="panel-footer clearfix" style="background-color: ">
		<button type="button" class="btn btn-success pull-right" id="btn_set"><i class="fa fa-plus-circle" aria-hidden="true"></i> Set Record</button>
	</div>
</form>
