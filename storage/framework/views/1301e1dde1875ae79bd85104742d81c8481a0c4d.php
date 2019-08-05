<?php $__env->startSection('page'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><i class="fa fa-truck" aria-hidden="true"></i> Sales Reports</h4></div>
            <div class="panel-body">
                <ul class="nav nav-tabs">
				  <li><a href="/salesreports/salesactivities">Sales Activity</a></li>
				  <li><a href="/salesreports/sellingitems">Top/Worst Selling Items</a></li>
				  <!-- <li><a href="/salesreports/grossprofits">Gross Profits</a></li> -->
                  <li><a href="/salesreports/salesanalysis">Sales Analysis</a></li>
                  <li class="active"><a href="/salesreports/voidreports">Void</a></li>
				</ul>

                <br>
                <form action="/salesreports/salesreports/search" method="post" class="form-inline">
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
                <a href="<?php echo e(route('salesreports/voidreports/pdf',['download'=>'pdf'])); ?>" class="pull-left"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>
                <table id="myTable" class="table table-hover">
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
        </div>
    </div>
</div>
<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/tablesort.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>