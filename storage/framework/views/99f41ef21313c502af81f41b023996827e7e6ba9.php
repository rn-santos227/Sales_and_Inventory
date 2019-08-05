<?php $__env->startSection('page'); ?>
<div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					File Entries	
				</div>
				<div class="panel-body">
					<?php if(Auth::user()->user_level == 'Administrator'): ?>
					<form action="fileentry/add" method="post" enctype="multipart/form-data">
						<?php echo e(csrf_field()); ?>

						<input type="file" name="filefield">
						<input type="submit">
					</form>
					<?php endif; ?>
					<?php $__currentLoopData = $entries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<a href="fileentry/dload/<?php echo e($entry->filename); ?>"><?php echo e($entry->original_filename); ?></a><br>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>