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
<div align="right"><?php echo e(Carbon\Carbon::now()->format('m/d/Y')); ?></div>
<img src='.<?php echo e(App\Company::all()->first()->getLogoAttribute()); ?>' style=" width: 20%;">
    <div align="left"><span style="font-size: 15px"><?php echo e($company->name); ?></span><br><div style="width: 25%"><?php echo e($company->address); ?></div>TIN:<?php echo e($company->TIN); ?><br><?php echo e($company->contact); ?>&nbsp;/&nbsp;<?php echo e($company->email); ?><br><br><center><span style="font-size: 13px;">Void Items Report</span><br><?php echo e($datefrom->format('m/d/Y')); ?> through <?php echo e($dateto->format('m/d/Y')); ?></div></center><br>
<div class="container">
	<table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Total</th>
                <th>Vatable</th>
                <th>Vat</th>
                <th>Vat Exempt</th>
                <th>Vat Zero</th>
                <th>Amount Due</th>
                <th>Cash</th>
                <th>Change Due</th>
                <th>User ID</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
                    <tr>
                        <td><?php echo e($item->id); ?></td>
                        <td><?php echo e($item->total); ?></td>
                        <td><?php echo e($item->vatable); ?></td>
                        <td><?php echo e($item->vat); ?></td>
                        <td><?php echo e($item->vat_exempt); ?></td>
                        <td><?php echo e($item->vat_zero); ?></td>
                        <td><?php echo e($item->amount_due); ?></td>
                        <td><?php echo e($item->cash); ?></td>
                        <td><?php echo e($item->change_due); ?></td>
                        <td><?php echo e($item->user_id); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($item->updated_at)->format('j F Y h:i A')); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
        </tbody>
    </table>
</div>