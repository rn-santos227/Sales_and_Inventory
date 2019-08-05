<div class="modal fade modalMolder" id="cashier" role="dialog" >
	<div class="modal-dialog">
		 <div class="panel panel-default">
			 <form class="form-horizontal" enctype="multipart/form-data">
	            <?php echo e(csrf_field()); ?>

			 	<div class="panel-heading"><h3><i class="fa fa-money" aria-hidden="true"></i> Cashier </h3></div>
			 	<div class="panel-body">
			 	    <div class="form-group<?php echo e($errors->has('count') ? ' has-error' : ''); ?>">
                        <label for="count" class="col-md-3 control-label">Item Count: </label>
                        <div class="col-md-8">
                            <input id="cashier-count" type="text" class="form-control" name="count" readonly style="background-color:#ffffff;">
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('base_amount') ? ' has-error' : ''); ?>">
                        <label for="cashier-base_amount" class="col-md-3 control-label">Base Amount: </label>
                        <div class="col-md-8">
                            <input id="receipt-base_amount" type="text" class="form-control" name="base_amount" readonly style="background-color:#ffffff;">
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('input_discount') ? ' has-error' : ''); ?>">
                        <label for="input_discount" class="col-md-3 control-label">Input Discount: </label>
                        <div class="col-md-8">
                            <input id="cashier-input_discount" value="0" type="number" min="1" max="100" class="form-control" name="input_discount" required>
                            <span class="help-block"><strong id="cashier-input_discount_message" style="color:#FF0000;"></strong></span>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('amount_due') ? ' has-error' : ''); ?>">
                        <label for="cashier-amount_due" class="col-md-3 control-label">Amount Due: </label>
                        <div class="col-md-8">
                            <input id="receipt-amount_due" type="text" class="form-control" name="amount_due" readonly style="background-color:#ffffff;">
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('cash') ? ' has-error' : ''); ?>">
                        <label for="cash" class="col-md-3 control-label">Cash: </label>
                        <div class="col-md-8">
                           <input id="cashier-cash" type="text" class="form-control" name="cash" required  readonly style="background-color:#ffffff;" >
                            <span class="help-block"><strong id="cashier-cash_message" style="color:#FF0000;"></strong></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cash" class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <?php echo $__env->make('numpad.numpad', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('input_discount') ? ' has-error' : ''); ?>">
                        <label for="cash" class="col-md-3 control-label">Input Discount: </label>
                        <div class="col-md-8">
                           <input id="cashier-input_discount" type="num" min="0" max="100" class="form-control" name="input_discount" required  readonly style="background-color:#ffffff;" >
                            <span class="help-block"><strong id="cashier-input_discount_message" style="color:#FF0000;"></strong></span>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('change_due') ? ' has-error' : ''); ?>">
                        <label for="change_due" class="col-md-3 control-label">Change Due: </label>
                        <div class="col-md-8">
                            <input id="cashier-change_due" type="number" min="1" class="form-control" name="cashier-change_due" readonly style="background-color:#ffffff;">
                        </div>
                    </div>
                <!-- end panel body -->  
			 	</div>
              	<div class="panel-footer clearfix">  
                    <button type="submit" class="btn btn-primary pull-right" style="margin-right: 10px;" id="cashier-submit">
                        <i class="fa fa-check-circle" aria-hidden="true"></i> Submit
                    </button>
                    <button type="button" data-dismiss="modal" class="btn btn-danger pull-right" style="margin-right: 10px;">
                        <i class="fa fa-times-circle" aria-hidden="true"></i> Dismiss
                    </button>
                </div>
			</form>
		</div>
	</div>
</div>
