<table class="table table-bordered table-responsive" id="table_list">
    <thead>
        <tr>
            <th class="col_hide">Receipt Number</th>
            <th>Table Name</th>
            <th class="col_hide">Customer Name</th>
            <th class="mobile">Status</th>
			<th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $occupied; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr id="table_<?php echo e($table->id); ?>">
            <td id="table_receipt<?php echo e($table->id); ?>" class="col_hide"><?php echo e($table->receipt->id); ?></td>  
            <td id="table_name<?php echo e($table->id); ?>"><?php echo e($table->name); ?></td>
            <td style="text-transform: capitalize;" id="table_customer<?php echo e($table->id); ?>" class="col_hide"><?php echo e($table->customer); ?></td>            
            <td style="text-transform: capitalize;" id="table_status<?php echo e($table->id); ?>" class="mobile"><?php echo e($table->status); ?></td>
            <td style="width: 180px;">
                <button class="btn btn-primary action-restaurant btn_order" data-toggle="modal" data-target="#orders" value="<?php echo e($table->id); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></button> 
                <button class="btn btn-success action-restaurant btn_cashier" data-toggle="modal" value="<?php echo e($table->id); ?>"><i class="fa fa-money" aria-hidden="true"></i></button> <button class="btn btn-danger action-restaurant btn_remove" value="<?php echo e($table->id); ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table>