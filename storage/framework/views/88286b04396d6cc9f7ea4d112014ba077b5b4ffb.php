<form class="form-horizontal">
	    <div class="form-group<?php echo e($errors->has('receipt_id') ? ' has-error' : ''); ?>">
        <label for="receipt_id" class="col-md-4 control-label">Receipt #: </label>
        <div class="col-md-8">
            <input id="receipt-id" type="text" class="form-control" name="receipt_id" readonly style="background-color:#ffffff;" value=<?php echo e(count($receipts) + 1000000); ?>>
        </div>
    </div>

	    <div class="form-group<?php echo e($errors->has('count') ? ' has-error' : ''); ?>">
        <label for="count" class="col-md-4 control-label">Item Count: </label>
        <div class="col-md-8">
            <input id="receipt-count" type="text" class="form-control" name="count" required readonly style="background-color:#ffffff;">
        </div>
    </div>

    <div class="form-group<?php echo e($errors->has('subtotal') ? ' has-error' : ''); ?>">
        <label for="subtotal" class="col-md-4 control-label">Subtotal: </label>
        <div class="col-md-8">
            <input id="receipt-subtotal" type="text" class="form-control" name="subtotal" required readonly style="background-color:#ffffff;">
        </div>
    </div>

    <div class="form-group<?php echo e($errors->has('vatable') ? ' has-error' : ''); ?>">
        <label for="vatable" class="col-md-4 control-label">VATable: </label>
        <div class="col-md-8">
            <input id="receipt-vatable" type="text" class="form-control" name="vatable"
            required readonly style="background-color:#ffffff;"> 
        </div>
    </div>

    <div class="form-group<?php echo e($errors->has('vat') ? ' has-error' : ''); ?>">
        <label for="vat" class="col-md-4 control-label">VAT: </label>
        <div class="col-md-8">
            <input id="receipt-vat" type="text" class="form-control" name="vat" required readonly style="background-color:#ffffff;">
        </div>
    </div>

    <div class="form-group<?php echo e($errors->has('discount') ? ' has-error' : ''); ?>">
        <label for="discount" class="col-md-4 control-label">Discount: </label>
        <div class="col-md-8">
           	<div class="input-group">
                <input id="receipt-discount" type="text" class="form-control" name="discount" required readonly style="background-color:#ffffff;">
               <div class = "input-group-btn">
                  	<button type="button" class="btn btn-primary dropdown-toggle" style="width: 100px" data-toggle="dropdown" id="btn_discount">0% <span class="caret"></span></button>
                  	<ul class = "dropdown-menu pull-right">
	                    <li><a data-value="0" class="compute_discount">No Discount</a></li>
                        <?php $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a data-value="<?php echo e($discount->rate); ?>" class="compute_discount"><?php echo e($discount->name); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  	</ul>
            	</div>
            </div>
        </div>
    </div>

    <div class="form-group<?php echo e($errors->has('vat_exempt') ? ' has-error' : ''); ?>">
        <label for="vatexempted" class="col-md-4 control-label">Discounted: </label>
        <div class="col-md-8">
            <input id="receipt-exempted" type="text" class="form-control" name="vat_exempt" required readonly style="background-color:#ffffff;">
        </div>
    </div>

  	<div class="form-group<?php echo e($errors->has('vat_sales') ? ' has-error' : ''); ?>">
        <label for="vat_sales" class="col-md-4 control-label">VAT Sales: </label>
        <div class="col-md-8">
            <input id="receipt-vat_sales" type="text" class="form-control" name="vat_sales" required readonly style="background-color:#ffffff;">
        </div>
    </div>
	<!-- end panel body -->  
</form>
