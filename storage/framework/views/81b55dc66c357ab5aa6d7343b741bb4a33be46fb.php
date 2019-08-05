<form class="form-horizontal" >
	<div class="panel-body">
		<div class="form-group">
	        <label for="receipt_id" class="col-md-2 control-label">Receipt Number: </label>
	        <div class="col-md-8">
	            <input id="receipt-id" type="text" class="form-control" name="receipt_id" readonly style="background-color:#ffffff;" value=<?php echo e(count($receipts) + 1000000); ?>>
	        </div>
        </div>

		<div class="form-group">
			<label for="subtotal" class="col-md-2 control-label">Customer Name</label>
			<div class="col-md-8">
				<input id="add-customer_name" type="text" class="form-control" name="customer_name" required autofocus>
                <strong id="customer_name-message" style="color:#FF0000;"></strong>
            </div>
        </div>

        <div class="form-group">
       		<label for="subtotal" class="col-md-2 control-label">Table Name</label>
       		<div class="col-md-8">
                <select class="form-control" id="add-table_name" name="table_name" required>
                	<?php $__currentLoopData = $v_tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                	<option value="<?php echo e($table->id); ?>"><?php echo e($table->name); ?></option>
                	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                	<option value="0">No Available</option>
                	}
                </select>
                <strong id="table_name-message" style="color:#FF0000;"></strong>
        	</div>
        </div>
	</div>
	<div class="panel-footer clearfix">
		<button class="btn btn-success pull-left"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Record</button>
	</div>
</form>
