<?php $__env->startSection('page'); ?>

<div class="row">
	<div class="col-md-7">
		<div class="panel panel-default">
			<div class="panel-heading">
				Product Catalog
			</div>
			<form>
	            <div class="panel-body" style="overflow: scroll; overflow-x: hidden; height:100vh;">
	                <input id="search" type="text" class="form-control" name="search" placeholder="Type the name or reference code of the product." required autofocus>
	                <?php echo $__env->make('retailer.data', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				</div>
	        </form>
		</div>
	</div>

		<div class="col-md-5">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row clearix">
						<form class="col-md-12">
							<p class="pull-left">Cart</p>
							<button type="button" class="btn btn-danger btn-xs pull-right clear"><i class="fa fa-eraser" aria-hidden="true"></i> Clear</button>
						</form>
					</div>
				</div>
				<div class="panel-body">
					<?php echo $__env->make('retailer.cart', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				</div>	
					<div class="panel-footer clearfix">
					<div class="accordion">
						<div class="accordion-section">
							<a class="accordion-section-title" data-accordion="#accordion-1" id="show" data-value="<?php echo e($setting->show_receipt); ?>"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Receipt Information </a>
			            	<div id="accordion-1" class="accordion-section-content">
			            	<?php echo $__env->make('retailer.receipt', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
<?php echo $__env->make('retailer.cashier', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('dialogs.info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('dialogs.warning', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/accordion.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/cashier-modal.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/retailer-script.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/receipt-script.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/numpad-script.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>