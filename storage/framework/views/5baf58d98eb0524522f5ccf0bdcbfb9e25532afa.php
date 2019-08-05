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
    <div align="left"><span style="font-size: 15px"><?php echo e($company->name); ?></span><br><div style="width: 25%"><?php echo e($company->address); ?></div>TIN:<?php echo e($company->TIN); ?><br><?php echo e($company->contact); ?>&nbsp;/&nbsp;<?php echo e($company->email); ?><br><br><center><span style="font-size: 13px;">Inventory Value Report</span><br><?php echo e($datefrom->format('m/d/Y')); ?> through <?php echo e($dateto->format('m/d/Y')); ?></div></center><br>
<div class="container">
    <table class="table table-hover">
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

    <div class="row">
        <div>
            <label>Total Cost of Inventory: <?php echo e(number_format($itemTotalCost, 2, '.', ',')); ?></label><br>
            <label>Total Retail Value of Inventory: <?php echo e(number_format($itemTotalValue, 2, '.', ',')); ?></label>
        </div>
    </div>
</div>
<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/tablesort.js')); ?>" type="text/javascript"></script>