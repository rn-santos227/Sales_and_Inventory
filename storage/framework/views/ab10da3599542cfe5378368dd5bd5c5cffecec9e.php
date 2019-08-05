<style type="text/css">
    body{
        font-size: 11px;
    }
	table {
    		    font-family: arial, sans-serif;
                
    		    border-collapse: collapse;
    		    width: 100%;
    		}
    		td, th {
    		    border: 1px solid #dddddd;
    		    text-align: left;
    		}
    .box
    {
        width: 33.33%;
        float: left;
    }
</style>
    <!-- <?php echo e($company); ?> -->
    <div align="center">Audit Trail<br><?php echo e($period); ?> Report<br><?php echo e($datefrom->format('m/d/Y')); ?> through <?php echo e($dateto->format('m/d/Y')); ?></div><br>
    <!-- <?php echo e(Carbon\Carbon::now()); ?> -->
<div>
    <table id="myTable" class="table table-hover">
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