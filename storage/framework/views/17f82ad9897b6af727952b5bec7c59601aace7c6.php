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
		<?php $__empty_1 = true; $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
		<tr id="discount_<?php echo e($discount->id); ?>">
			<td class="col_hide"><?php echo e($discount->ref_code); ?></td>
			<td><?php echo e($discount->name); ?></td>
			<td><?php echo e($discount->rate); ?></td>
			<td class="col_hide"><?php echo e($discount->active); ?></td>
            <td class="action">
                <button class="btn btn-primary action btn_view" data-toggle="modal" data-target="#view" value="<?php echo e($discount->id); ?>"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button>
                <button class="btn btn-warning action btn_fetch" data-toggle="modal" data-target="#update" value="<?php echo e($discount->id); ?>"><i class="fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Edit</span></button>
            </td>	
		</tr>

		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr><td colspan="5"><p>No discount Available</p></td></tr>
        <?php endif; ?>
	</tbody>
</table>	
<?php echo $discounts->render(); ?>

