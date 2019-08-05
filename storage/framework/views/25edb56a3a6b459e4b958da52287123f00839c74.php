<?php $__env->startSection('page'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading"><h4><i class="fa fa-clipboard" aria-hidden="true"></i> Attendance</h4></div>
			<div class="panel-body">
				<table class="table table-bordered table-responsive" id="data">
					<thead>
						<tr>
							<th>Employee Name</th>
							<th>Employee Designation</th>
				            <th>Attendance</th>
						</tr>
					</thead>
					<tbody>
					<?php $__empty_1 = true; $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
						<tr id="employee_<?php echo e($employee->id); ?>">
							<td><?php echo e($employee->last_name . ', ' . $employee->first_name); ?></td>
							<td><?php echo e($employee->designation); ?></td>
							<td align="center">
								<label class="switch">
									<input id="<?php echo e($employee->id); ?>" val="<?php echo e($employee->present); ?>" class="set-attendance" type="checkbox" <?php echo e($employee->present == 1 ? 'checked' : ''); ?>>
									<span class="slider"></span>
								</label>
							</td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
			            <tr><td colspan="3"><p>No Employee is active.</p></td></tr>
			        <?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>



<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/attendance-script.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>