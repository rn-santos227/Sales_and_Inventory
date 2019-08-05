<?php $__env->startSection('content'); ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
	.borderless > tbody > tr > td,
	.borderless > tbody > tr > th,
	.borderless > tfoot > tr > td,
	.borderless > tfoot > tr > th {
	    border: none;
	}

	#slider{
		overflow: hidden;
	}

	#slider ul {
	  list-style: none;
	  overflow: hidden;
	  padding: 0;
	  margin: 0;
	}

	#slider ul li {
	  display: block;
	  overflow: hidden;
	  padding: 0;
	  margin: 0;
	}


}

</style>
<div class="col-md-6">
	<div class="panel panel-default" style="margin-top: -5%; height: 93vh;">
		<div class="panel-body">
			<div class="row">
				<table class="table table-hover borderless">
					<thead>
						<tr>
							<th class="text-center">NAME</th>
							<th class="text-center">QTY.</th>
							<th class="text-center">PRICE</th>
						</tr>
					</thead>
					
					<tbody class="text-center">
					</tbody>
					
				</table>
			</div>
		</div>
	</div>
</div>

<div class="col-md-6" >
	<div class="panel panel-default" style="margin-top: -5%; height: 93vh;">
		<div id="slider">
		  <ul style="width: 100%; height: 92vh;">    
		    <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
		    	<li><img src="<?php echo e($item->image); ?>" style="width: 100%; height: 100%;"></li>	
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
			<?php endif; ?>
		  </ul>  
		</div>
	</div>
</div>	
<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/fastfoodmonitor-script.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>