<table class="table table-bordered table-responsive" id="data">
	<thead>
		<tr>
			<th>Name</th>
			<th>Designation</th>
			<th class="col_hide">Status</th>
			<th class="action">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $__empty_1 = true; $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
		<tr id="employee_<?php echo e($employee->id); ?>">
			<td><?php echo e($employee->last_name . ', ' . $employee->first_name); ?></td>
			<td><?php echo e($employee->designation); ?></td>
			<td class="col_hide"><?php echo e($employee->active); ?></td>
            <td class="action">
                <button class="btn btn-primary action btn_view" data-toggle="modal" data-target="#view" value="<?php echo e($employee->id); ?>"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button>
                <button class="btn btn-warning action btn_fetch" data-toggle="modal" data-target="#update" value="<?php echo e($employee->id); ?>"><i class="fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Edit</span></button>
            </td>	
		</tr>

		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr><td colspan="5"><p>No Employee Available</p></td></tr>
        <?php endif; ?>
	</tbody>
</table>	
<?php echo $employees->render(); ?>

