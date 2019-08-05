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

<div class="col-md-6">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
       <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="item<?php echo e(($i) ? '' : ' active'); ?>">
            <img src="<?php echo e($banner->image); ?>"> 
        </div>
    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
	
<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/fastfoodmonitor-script.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>