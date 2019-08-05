<?php $__env->startSection('page'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" style="margin-bottom: 1%;">
            <div class="panel-body">
                <form action="/orders/search" method="post" class="form-inline">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <input type="text" name="dateto" id="search" value="" placeholder="Search by ID" class="form-control">
                    </div>
                    
                    <div class="form-group pull-right">
                        <button class="btn btn-primary btn-md" id = "ordersearch" type="button"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                    </div>
                    
                    <div class="form-group pull-right">
                        <label style="font-size: 80%;">To:</label>
                        <input type="date" name="dateto" id="dateto" value="" class="form-control" style="width: 78%; font-size: 60%;">
                    </div>
                    <div class="form-group pull-right">
                        <label style="font-size: 80%;">From:</label>
                        <input type="date" name="datefrom" id="datefrom" value="" class="form-control" style="width: 78%; font-size: 60%;">
                    </div>
                    <input type="hidden" name="mode" id="mode" value = <?php echo e($mode); ?>>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Order List</div>
            <div class="panel-body">



                <table id="myTable" class="table table-hover OrdersTable">
                 <thead>
                    <tr>
                        <th>ID</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Time</th>
                    </tr>
                
                </thead>
                    <tbody>
                       <?php $__empty_1 = true; $__currentLoopData = $receipts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receipt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
                            <tr>
                                <td><a class="orderid" id="<?php echo e($receipt->id); ?>"><?php echo e($receipt->id); ?></a></td>
                                <td><?php echo e($receipt->total); ?></td>
                                <td style="text-transform: capitalize;"><?php echo e($receipt->status); ?></td>
                                <td><?php echo e(\Carbon\Carbon::parse($receipt->created_at)->format('h:i A')); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Order Information</div>
            <div class="panel-body">
                <div id="Orderinfo">
                    <label id="receiptid"></label>
                    <table id="myTable" class="table table-hover ItemsTable">
                        <thead>
                            <th class="text-center">Name</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Each</th>
                            <th class="text-center">Subtotal</th>
                        </thead>
                        <tbody class="text-center">
                        </tbody>
                    </table>
                    <div class="row">
                        <div id="receipt">
                        </div>
                    </div>
                </div>
            </div>
            <div id="footer" class="panel-footer clearfix">
                
            </div>
        </div>
    </div>
</div>


<?php echo $__env->make('orders.void', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/orderscript.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>