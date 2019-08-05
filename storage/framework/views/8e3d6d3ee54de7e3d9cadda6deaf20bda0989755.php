<?php $__env->startSection('page'); ?>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Product List
            </div>

            <div class="panel-body"  style="overflow: scroll; overflow-x: hidden; height: 44vh;">
                <div class="form-group">
                    <input type="text" id="searchStr" placeholder="Enter Product Reference Code..." class="form-control" style="width: 100%;">
                </div>

                <table id="myTable" class="table table-hover itemsTable" style="height: 50%;" >
                    <thead>
                        <tr>
                            <th>Reference Code</th>
                            <th>Name</th>
                            <th>Category</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
                        <tr>
                            <td><a class="product_ref_code" id="<?php echo e($product->refCode); ?>"><?php echo e($product->refCode); ?></a></td>
                            <td><?php echo e($product->itemName); ?></td>
                            <td><?php echo e($product->categoryName); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-default" style="height: 51.2vh;">
            <div class="panel-heading">
                Product Information
            </div>

            <div class="panel-body">
                <div class="row">

                    <div id='productInfo'>
                        <div class='col-md-12' style='float: left;'>
                            <div class='row'>
                                <div class='col-md-6 pull-left'><strong>Reference Code:</strong></div>
                                <div class='col-md-6 pull-right' id='prodRefCode'></div>
                                <input type='hidden' id='prodRefCodeHidden'>
                            </div>

                            <div class='row'>
                                <div class='col-md-6 pull-left'><strong>Product Name:</strong></div>
                                <div class='col-md-6 pull-right' id='prodName'></div>
                                <input type='hidden' id='prodNameHidden'>
                            </div>

                            <div class='row'>
                                <div class='col-md-6 pull-left'><strong>Supplier:</strong></div>
                                <div class='col-md-6 pull-right' id='prodSupplier'></div>
                                <input type='hidden' id='prodSupplierHidden'>
                            </div>

                            <div class='row'>
                                <div class='col-md-6 pull-left'><strong>Cost:</strong></div>
                                <div class='col-md-6 pull-right'>
                                    <input id='prodCost' type='number' min='0' value='0'  style='border: none; width: 50%; height: 50%;'>
                                </div>
                            </div>

                            <div class='row'>
                                <div class='col-md-6 pull-left'><strong>Price:</strong></div>
                                <div class='col-md-6 pull-right'>
                                    <input id='prodPrice' type='number' min='0' value='0'  style='border: none; width: 50%; height: 50%;'>
                                </div>
                            </div>

                            <div class='row'>
                                <div class='col-md-6 pull-left'><strong>Excise Tax:</strong></div>
                                <div class='col-md-6 pull-right'>
                                    <input id='prodTax' type='number' min='0' value='0'  style='border: none; width: 50%; height: 50%;'>
                                </div>
                            </div>

                            <div class='row'>
                                <div class='col-md-6 pull-left'><strong>Quantity:</strong></div>
                                <div class='col-md-6 pull-right'>
                                    <input id='prodQty' type='number' min='0' value='0'  style='border: none; width: 50%; height: 50%;'>
                                </div>
                            </div>

                            <div class='row'>
                                <div class='col-md-6 pull-left'><strong>Re-order Point:</strong></div>
                                <div class='col-md-6 pull-right'>
                                    <input id='prodRop' type='number' min='0' value='0' style='border: none; width: 50%; height: 50%;'>
                                </div>
                            </div>

                            <div class='row'>
                                <div class='col-md-6 pull-left'><strong>Expiration Date:</strong></div>
                                <div class='col-md-6 pull-right'>
                                    <input id='prodExpDate' type='date' style='border: none; width: 70%; height: 50%;'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="footer" class="panel-footer clearfix">
                <button class="pull-right btn btn-success btn-sm" id="addToInventory">Add to Inventory</button>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Inventory
            </div>

            <div class="panel-body">
                <ul class="nav nav-tabs">
                  <li id = "currentInventory" class="active"><a>Current Inventory </a></li>
                  <li id = "inactiveInventory"><a>Inactive Inventory </a></li>
                </ul>

                <div id="inventorylist">
                    <table id="myTable" class="table table-hover rowClick sort">
                        <thead>
                            <tr>
                                <th style="display:none;">ID</th>
                                <th>Reference Code</th>
                                <th>Name</th>
                                <th>Supplier</th>
                                <th>Cost</th>
                                <th>Price</th>
                                <th>Tax</th>
                                <th>Quantity</th>
                                <th>Re-order Point</th>
                                <th>Expiration Date</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $inventories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inventory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
                            <tr>
                                <td style="display:none;"><?php echo e($inventory->id); ?></td>
                                <td><?php echo e($inventory->ref_code); ?></td>
                                <td><?php echo e($inventory->name); ?></td>
                                <td><?php echo e($inventory->supplier_id); ?></td>
                                <td><?php echo e($inventory->cost); ?></td>
                                <td><?php echo e($inventory->price); ?></td>
                                <td><?php echo e($inventory->tax); ?>%</td>
                                <td><?php echo e($inventory->quantity); ?></td>
                                <td><?php echo e($inventory->reorder_point); ?></td>
                                <td><?php echo e($inventory->expiration_date); ?></td>
                                <td><button id="<?php echo e($inventory->id); ?>" class='btn btn-xs btn-danger btn_delete' style='border-radius: 50%;'><i class='fa fa-trash' aria-hidden='true'></i></button></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="inventoryFooter" class="panel-footer clearfix">
                <input type="hidden" id="inventoryID">
                <input type="hidden" id="inventoryRef_code">
                <button class="pull-right btn btn-primary btn-sm" id="updatecost" style="margin-left: 1%;">Update Cost</button>
                <button class="pull-right btn btn-primary btn-sm" id="updateprice" style="margin-left: 1%;">Update Price</button>
                <button class="pull-right btn btn-primary btn-sm" id="updatetax" style="margin-left: 1%;">Update Tax</button>
                <button class="pull-right btn btn-primary btn-sm" id="updatereorderpoint" style="margin-left: 1%;">Update Re-order Point</button>
                <button class="pull-right btn btn-primary btn-sm hide" id="updatestocks" style="margin-left: 1%;">Update Stocks</button>
                <button class="pull-right btn btn-primary btn-sm" id="updateexpdate" style="margin-left: 1%;">Update Expiration Date</button>
                <button class="pull-right btn btn-primary btn-sm" id="addstocks" style="margin-left: 1%;">Add Stocks</button>
                <button class="pull-right btn btn-danger btn-sm" id="pullstocks" style="margin-left: 1%;">Pull Stocks</button>
                <button class="pull-right btn btn-danger btn-sm" id="setactin" style="margin-left: 1%;">Active/Inactive</button>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('dialogs.info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('inventory.updatetax', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('inventory.updateprice', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('inventory.updatecost', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('inventory.updatereorderpoint', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('inventory.addstocks', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('inventory.pullstocks', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('inventory.updatestocks', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('inventory.setstatus', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('inventory.updateexpiration', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/inventory.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('js/tablesort.js')); ?>"></script> -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>