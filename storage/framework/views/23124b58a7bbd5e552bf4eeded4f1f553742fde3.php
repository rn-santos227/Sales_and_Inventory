<?php $__env->startSection('page'); ?>
<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<script type="text/javascript">
</script>
	<div class="container-fluid">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading"><h4><i class="fa fa-archive" aria-hidden="true"></i> Inventory Reports</h4></div>
				<div class="panel-body">
					<ul class="nav nav-tabs">
						<li><a href="/inventoryreports/inventoryvalue">Inventory Value</a></li>
						<li class="active"><a href="/inventoryreports/inventorylogs">Inventory Logs</a></li>
						<li><a href="/inventoryreports/inventorybeginning-ending">Beginning-Ending Inventory</a></li>
					</ul>

                    <br>

                    <form action="/inventoryreports/inventorylogs/search" method="post" class="form-inline">
                    <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label>Date From:</label>
                            <input type="date" name="datefrom" id="datefrom" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Date To:</label>
                            <input type="date" name="dateto" id="dateto" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Period:</label>
                            <select name="period" id="period" class="form-control">
                                <option></option>
                                <option>Daily</option>
                                <option>Weekly</option>
                                <option>Monthly</option>
                                <option>Yearly</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-md" type="submit"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                        </div>
                    </form>

                    <br>
                    <a href="<?php echo e(route('inventoryreports/inventorylogs/pdf',['download'=>'pdf'])); ?>" class="pull-left"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>

					<table id = "myTable" class="table table-hover">
						<thead>
							<tr>
								<th>User</th>
								<th>Reference Code</th>
							    <th>Field</th>
							    <th>Action</th>
							    <th>Amount</th>
							    <th>Old Value</th>
							    <th>New Value</th>
							    <th style="max-width: 300px;">Comment</th>
                                <th>Date</th>
						    </tr>
					    </thead>

					    <tbody>
					    <?php $__empty_1 = true; $__currentLoopData = $inventorylogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
					    	<tr>
                                <td><?php echo e($log->user_id); ?></td>
                                <td><?php echo e($log->ref_code); ?></td>
                                <td><?php echo e($log->field); ?></td>
                                <td><?php echo e($log->action); ?></td>
                                <td><?php echo e($log->amount); ?></td>
                                <td><?php echo e($log->old_value); ?></td>
                                <td><?php echo e($log->new_value); ?></td>
                                <td style="max-width: 300px;"><?php echo e($log->comment); ?></td>
                                <td><?php echo e(\Carbon\Carbon::parse($log->created_at)->format('j F Y h:i A')); ?></td>
                            </tr>
					    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
					    	<?php endif; ?>
					    </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/tablesort.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>