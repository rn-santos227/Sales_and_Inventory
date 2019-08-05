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
    <div align="left"><br><span style="font-size: 15px"><?php echo e($company->name); ?></span><br><div style="width: 25%"><?php echo e($company->address); ?></div>TIN:<?php echo e($company->TIN); ?><br><?php echo e($company->contact); ?>&nbsp;/&nbsp;<?php echo e($company->email); ?><br><br><center><span style="font-size: 13px;">Sales Activities Report</span><br></div></center><br>
<div>
    <table id="myTable" class="table table-hover">
        <thead>
            <tr>
                <th>Total Cost</th>
                <th>Total Gross Revenue</th>
                <th>Total Profit</th>
                <th>Period</th>
            </tr>
        </thead>
        
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $salesanalysis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $analysis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
            <tr>
                <td><?php echo e($analysis->total_cost); ?></td>
                <td><?php echo e($analysis->total_grossrev); ?></td>
                <td><?php echo e($analysis->total_profit); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($analysis->created_at)->format($format)); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>