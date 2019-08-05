<?php $__empty_1 = true; $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
	<div class='col-md-4 hide-x-bar'>
		<form>
			<div class='panel panel-default'>
				<div class='panel-heading menu-heading'>
					<label><?php echo e($menu->name); ?></label>
				</div>
				<div class='panel-body'>
					<img class='img-rounded' src='<?php echo e($menu->image); ?>' width='100%'>
					<label><?php echo e($menu->price); ?></label>
				</div>
				<div class='panel-footer clearfix'>
					<center>
						<?php echo e(csrf_field()); ?>

						<input type='hidden' name='id'  id='id<?php echo e($menu->id); ?>' value='<?php echo e($menu->id); ?>'>
						<input type='hidden' name='name'  id='name<?php echo e($menu->id); ?>' value='<?php echo e($menu->name); ?>'>
						<input type='hidden' name='price' id='price<?php echo e($menu->id); ?>' value='<?php echo e($menu->price); ?>'>
						<button class='btn btn-xs btn-success addToTray' type='button' id='<?php echo e($menu->id); ?>' ><i class='fa fa-inbox' aria-hidden='true'></i> Add to Tray</button>
					</center>
				</div>
			</div>
		</form>
	</div>			
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <p>No menu Available</p>
<?php endif; ?>