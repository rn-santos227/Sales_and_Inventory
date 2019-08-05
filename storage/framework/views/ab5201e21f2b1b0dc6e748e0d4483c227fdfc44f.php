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
    <div align="left"><span style="font-size: 15px"><?php echo e($company->name); ?></span><br><div style="width: 25%"><?php echo e($company->address); ?></div>TIN:<?php echo e($company->TIN); ?><br><?php echo e($company->contact); ?>&nbsp;/&nbsp;<?php echo e($company->email); ?><br><br><center><span style="font-size: 13px;">Inventory Logs Report</span><br><?php echo e($datefrom->format('m/d/Y')); ?> through <?php echo e($dateto->format('m/d/Y')); ?></div></center><br>
<div class="container">
    </table>
    <table class="table table-hover">
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
<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/tablesort.js')); ?>" type="text/javascript"></script>