<style type="text/css">
	body{
        font-size: 11px;
        font-family: arial, sans-serif;
    }
	table {
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
<div class="container">
	<div align="right"><?php echo e(Carbon\Carbon::now()->format('m/d/Y')); ?></div>
    <div align="left"><span style="font-size: 15px"><?php echo e($company->name); ?></span><br><div style="width: 25%"><?php echo e($company->address); ?></div>TIN:<?php echo e($company->TIN); ?><br><?php echo e($company->contact); ?>&nbsp;/&nbsp;<?php echo e($company->email); ?><br><br><center><span style="font-size: 13px;">Categories List</span></center>
	<table>
		<tr>
            <th>ID</th>
            <th>CODE</th>
            <th>Name</th>
            <th>DESCRIPTION</th>
        </tr>
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($item->id); ?></td>
            <td><?php echo e($item->ref_code); ?></td>
            <td><?php echo e($item->name); ?></td>
            <td><?php echo e($item->description); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</table>
</div>