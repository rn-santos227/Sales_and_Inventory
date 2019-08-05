<?php $__env->startSection('page'); ?>

<div class="container-fluid">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading"><h4><i class="fa fa-history" aria-hidden="true"></i> Audit Trail</h4></div>
			<div class="panel-body">
				
				<form action="/audittrail/search" method="post" class="form-inline">
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
                <a href="<?php echo e(route('/audittrail/pdf',['download'=>'pdf'])); ?>" class="pull-left"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>
				<table class="table table-hover">
					<thead>
						<tr>
						    <th>Username</th>
						    <th>Form</th>
						    <th>Action</th>
						    <th>Date</th>
					    </tr>
				    </thead>
				    <tbody>
				    	<?php $__empty_1 = true; $__currentLoopData = $audittrails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $audittrail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($audittrail->username); ?></td>
                            <td><?php echo e($audittrail->form_name); ?></td>
                            <td><?php echo e($audittrail->activity); ?></td>
                            <td><?php echo e($audittrail->created_at); ?></td>
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