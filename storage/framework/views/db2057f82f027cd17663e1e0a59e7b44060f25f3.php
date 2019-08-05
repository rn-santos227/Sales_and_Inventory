<?php $__env->startSection('page'); ?>
<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<script type="text/javascript">
</script>
	<div class="container-fluid">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Inventory Value</h3></div>
				<div class="panel-body">
						<div class="row">
							<div class="col-md-3">
								<label>Total Cost of Inventory:</label><br>
								<label>Total Retail Value of Inventory:</label>
							</div>
							<div class="col-md-6">
								<strong>Php <?php echo e($itemTotalCost); ?></strong><br>
								<strong>Php <?php echo e($itemTotalValue); ?></strong>
							</div>
					</div>
					<!-- <label>Total Cost of Inventory:</label> <strong><?php echo e($itemTotalCost); ?></strong><br>
					<label>Total Retail Value of Inventory:</label> <strong><?php echo e($itemTotalValue); ?></strong> -->
					<table id = "myTable" class="table table-hover">
						<thead>
							<tr>
								<th>ID</th>
							    <th>Item</th>
							    <th>Quantity</th>
							    <th>Cost</th>
							    <th>Price</th>
							    <th>Total Cost</th>
							    <th>Total Retail Value</th>
						    </tr>
					    </thead>
					    <tbody>
					    	<?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                            	<td><?php echo e($item->id); ?></td>
                                <td><?php echo e($item->name); ?></td>
                                <td><?php echo e($item->quantity); ?></td>
                                <td><?php echo e(number_format($item->cost, 2, '.', ',')); ?></td>
                                <td><?php echo e(number_format($item->price, 2, '.', ',')); ?></td>
                                <td><?php echo e(number_format($item->quantity * $item->cost, 2, '.', ',')); ?></td>
                                <td><?php echo e(number_format($item->quantity * $item->price, 2, '.', ',')); ?></td>
                            </tr>        
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
					    </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>