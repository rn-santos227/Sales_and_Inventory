<table class="table table-bordered table-responsive" id="data">
	<thead>
		<tr>
			<th class="col_hide">Reference Code</th>
			<th>Name</th>
			<th>Status</th>
			<th class="action">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
		<tr id="#category_<?php echo e($category->id); ?>">
			<td class="col_hide"><?php echo e($category->ref_code); ?></td>
			<td><?php echo e($category->name); ?></td>
			<td><?php echo e($category->active); ?></td>
            <td class="action">
                <button class="btn btn-primary action btn_view" data-toggle="modal" data-target="#view" value="<?php echo e($category->id); ?>"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button>
                <button class="btn btn-warning action btn_fetch" data-toggle="modal" data-target="#update" value="<?php echo e($category->id); ?>"><i class="fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Edit</span></button>
            </td>		
        </tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr><td colspan="4"><p>No category Available</p></td></tr>
        <?php endif; ?>
	</tbody>
</table>
<div id="pagination">
<center>
	<?php echo $categories->render(); ?>

</center>
</div>
