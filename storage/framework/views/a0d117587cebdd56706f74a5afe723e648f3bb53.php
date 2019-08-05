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
<?php if(App\Company::all()->first()->logo != "/images/logos/"): ?>
    <img src='.<?php echo e(App\Company::all()->first()->logo); ?>' style=" width: 20%;">
<?php endif; ?>
    <div align="left"><br><span style="font-size: 15px"><?php echo e($company->name); ?></span><br><div style="width: 25%"><?php echo e($company->address); ?></div>TIN:<?php echo e($company->TIN); ?><br><?php echo e($company->contact); ?>&nbsp;/&nbsp;<?php echo e($company->email); ?><br><br><center><span style="font-size: 13px;">Sales Activities Report</span><br><?php echo e($datefrom->format('m/d/Y')); ?> through <?php echo e($dateto->format('m/d/Y')); ?></div></center><br>
<div>
    <table id="myTable" class="table table-hover">
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
    <thead>
    </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $receipts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receipt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
                <tr>
                    <td><?php echo e($receipt->id); ?></td>
                    <td><?php echo e($receipt->total); ?></td>
                    <td><?php echo e($receipt->vatable); ?></td>
                    <td><?php echo e($receipt->vat); ?></td>
                    <td><?php echo e($receipt->vat_exempt); ?></td>
                    <td><?php echo e($receipt->vat_zero); ?></td>
                    <td><?php echo e($receipt->amount_due); ?></td>
                    <td><?php echo e($receipt->cash); ?></td>
                    <td><?php echo e($receipt->change_due); ?></td>
                    <td><?php echo e($receipt->user_id); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($receipt->created_at)->format('j F Y h:i A')); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>