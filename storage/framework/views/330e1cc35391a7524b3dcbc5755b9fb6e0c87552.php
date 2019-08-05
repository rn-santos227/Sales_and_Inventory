<?php $__env->startSection('page'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><i class="fa fa-users" aria-hidden="true"></i>  Customers</h4></div>
            <div class="panel-body">
            <!-- Search Panel -->
                <div class="panel search">
                    <form method="GET" action="\customers">
                        <div class="panel-body">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search for..." value="<?php echo e(old('search')); ?>">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Search</span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
                                        <i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span> <span class="hidden-xs hidden-sm"> New Customer</span>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="panel-footer" id="accordion" style="padding-left: 30px; padding-right: 30px; "> 
                            <div class="form-group">           
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-tags" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">&nbsp;&nbsp;&nbsp;Search By</span></span>
                                    <select class="form-control" aria-describedby="sizing-addon2">
                                        <option value="id">ID Number</option>
                                        <option value="name">Customer Name</option>
                                        <option value="email">Customer Email</option>
                                        <option value="contact">Customer Contact</option>
                                        <option value="address">Customer Address</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">           
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-list" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">&nbsp;&nbsp;&nbsp;Sort By</span></span>
                                    <select class="form-control" aria-describedby="sizing-addon2">
                                        <option>ID Number</option>
                                        <option>Product Name</option>
                                        <option>Product Code</option>
                                        <option>Product Category</option>
                                        <option>Product Supplier</option>
                                        <option>Date Added</option>
                                        <option>Last Update</option>
                                        <option>Quantity</option>
                                        <option>Price</option>
                                        <option>User Added</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Item Table Panel -->
                <table class="table table-bordered table-responsive">
                <a href="<?php echo e(route('pdf',['download'=>'pdf'])); ?>" class="pull-left"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>&nbsp;
                        <a href="fileentry/dload/phpE8BD.tmp.xlsx"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Download Excel Template</a>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th class="col_hide">Contact</th>
                            <th class="col_hide">Status</th>
                            <th class="action">Action</th>
                        </tr>
                    </thead>
                    <?php $__empty_1 = true; $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    
                    <tbody>
                        <tr>
                            <td><?php echo e($customer->name); ?></td>
                            <td><?php echo e($customer->email); ?></td>
                            <td class="col_hide"><?php echo e($customer->contact); ?></td>
                            <td class="col_hide"><?php echo e($customer->active); ?></td>
                            <td class="action">
                                <button class="btn btn-primary action" data-toggle="modal" data-target="#view<?php echo e($customer->id); ?>"><i class="fa fa-info-circle" aria-hidden="true"></i>
                <span class="hidden-xs hidden-sm"> View</span></button>
                                <button class="btn btn-warning action" data-toggle="modal" data-target="#update<?php echo e($customer->id); ?>"><i class="fa fa-pencil" aria-hidden="true"></i>
                <span class="hidden-xs hidden-sm"> Edit</span></button>
<!--                                    <button class="btn btn-danger" style="width: 100px;">Remove</button>-->
                            </td>
                        </tr>        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                          <tr><td colspan="5"><p>No customer Available</p></td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
                <center>
                    <?php echo e($customers->links()); ?>

                </center>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('customers.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('customers.view', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('customers.update', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>