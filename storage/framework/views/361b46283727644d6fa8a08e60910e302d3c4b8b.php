<?php $__env->startSection('page'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading"><h4><i class="fa fa-cutlery"></i> Restaurant</h4></div>
				<div class="panel-body">
                    <!-- Search Panel -->
                    <div class="accordion">
                    	<div class="accordion-section">
                    	<a class="accordion-section-title" data-accordion="#accordion-1"><b><i class="fa fa-pencil" aria-hidden="true"></i> Add New Table</b></a>
                    	<div id="accordion-1" class="accordion-section-content">
		            	<?php echo $__env->make('restaurant.set', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    	</div>
                    </div>
                    <div id="product_container">
                       <?php echo $__env->make('restaurant.data', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	
                   </div>
				</div>
			</div>
		</div>
	</div>

<!-- Child Views -->
<?php echo $__env->make('restaurant.orders', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('restaurant.cashier', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- Dialog Messages -->
<?php echo $__env->make('dialogs.info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('dialogs.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('dialogs.warning', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- JavaScript Scripts -->
<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/accordion.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/receipt-script.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/restaurant-script.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/numpad-script.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>