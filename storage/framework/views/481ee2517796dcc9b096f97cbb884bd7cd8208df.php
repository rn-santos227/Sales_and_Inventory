<form class="form-horizontal" >
	<div class="panel-body">
		<div class="form-group">
	        <label for="receipt_id" class="col-md-2 control-label">Receipt Number: </label>
	        <div class="col-md-8">
	            <input id="set-receipt_id" type="text" class="form-control" name="receipt_id" readonly style="background-color:#ffffff;" value=<?php echo e($receipt_id); ?>>
	        </div>
        </div>

		<div class="form-group">
			<label for="subtotal" class="col-md-2 control-label">Customer Name</label>
			<div class="col-md-8">
				<input id="set-customer" type="text" class="form-control" name="customer_name" required autofocus list="names">
                <strong id="set-customer_message" style="color:#FF0000;"></strong>
                <datalist id="names">
                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($customer->name); ?>"><?php echo e($customer->id); ?> <?php echo e($customer->email); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </datalist>
            </div>
        </div>

        <div class="form-group">
       		<label for="subtotal" class="col-md-2 control-label">Table Name</label>
       		<div class="col-md-8">
                <select class="form-control" id="set-table_id" name="table_id" required>
                	<?php $__empty_1 = true; $__currentLoopData = $vacant; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                	<option value="<?php echo e($table->id); ?>"><?php echo e($table->name); ?> (<?php echo e($table->description); ?>)</option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <option value="0">No Available</option>
                	<?php endif; ?>
                </select>
                <strong id="set-table_id_message" style="color:#FF0000;"></strong>
        	</div>
        </div>

        <div class="form-group">
            <label for="subtotal" class="col-md-2 control-label">Attendant</label>
            <div class="col-md-8">
                <select class="form-control" id="set-employee_id" name="employee_id" required>
                    <?php $__empty_1 = true; $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <option value="<?php echo e($employee->id); ?>"><?php echo e($employee->last_name . ', ' . $employee->first_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <option value="0">No Available</option>
                    <?php endif; ?>
                </select>
                <strong id="set-employee_id_message" style="color:#FF0000;"></strong>
            </div>
        </div>


	</div>
	<div class="panel-footer clearfix" style="background-color: ">
		<button type="button" class="btn btn-success pull-right" id="btn_set"><i class="fa fa-plus-circle" aria-hidden="true"></i> Set Record</button>
	</div>
</form>
