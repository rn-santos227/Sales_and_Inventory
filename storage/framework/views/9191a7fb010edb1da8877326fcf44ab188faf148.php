<?php $__env->startSection('page'); ?>
<div>
	<div class="row">
		<div class="col-md-7">
			<div class="panel panel-default">
				<div class="panel-heading">
					Menu	
				</div>
				<div class="panel-body" style="overflow: scroll; overflow-x: hidden; height:80vh;">
					<form style="margin-bottom: 10%;">
						<div class="col-md-8">
							<input id="searchstr" class="form-control" type="text" placeholder="Search">
						</div>

						<div class="col-md-4">
							<select id="category" class="form-control">
								<option value="0">All</option>
								<?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            	<option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                            	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
	                            <?php endif; ?>
							</select>
						</div>
					</form>

					<div id="tray">	
						<?php echo $__env->make('fastfood.data', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;	
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="panel panel-default">
				<div class="panel-heading" style="margin-bottom: 0px; padding-bottom: 0px;">
					<div class="row clearix">
						<form class="col-md-12">
							<p class="pull-left">Tray</p>
							<button type="button" class="btn btn-danger btn-xs pull-right clear"><i class="fa fa-eraser" aria-hidden="true"></i> Clear</button>
						</form>
					</div>
				</div>
				<div class="panel-body">
					<?php echo $__env->make('fastfood.tray', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				</div>	
				<div class="panel-footer clearfix">
					<div class="accordion">
						<div class="accordion-section">
							<a class="accordion-section-title" data-accordion="#accordion-1" id="show" data-value="<?php echo e($setting->show_receipt); ?>"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Receipt Information </a>
			            	<div id="accordion-1" class="accordion-section-content">
			            	<?php echo $__env->make('fastfood.receipt', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			            	</div>
		            	</div>
		            </div>	
	            	<br/>
					<label>&nbsp;&nbsp;Amount Due: </label>
					<div class="input-group input-group-lg">
						<input style="background-color:#ffffff;" type="text" class="form-control" id="cashier-amount_due" name="amount_due" value="" readonly> <span class="input-group-btn"><button class="btn btn-md btn-success" id="cashier-modal"><i class="fa fa-money" aria-hidden="true"></i> Cashier</button></span> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo $__env->make('fastfood.cashier', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- Dialogs -->
<?php echo $__env->make('dialogs.info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('dialogs.warning', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('dialogs.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- Scripts -->
<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/accordion.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/cashier-modal.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/fastfood-script.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/receipt-script.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/numpad-script.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>