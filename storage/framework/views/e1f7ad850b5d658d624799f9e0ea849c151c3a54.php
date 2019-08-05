<?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade modalMolder" id="view<?php echo e($customer->id); ?>" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <div class="panel-heading">View customer</div>
            <form class="form-horizontal" method="POST" action="/customers">
                <?php echo e(csrf_field()); ?>

                <div class="panel-body">      
                    <div class="form-group" id="name">
                        <label for="name" class="col-md-4 control-label">Name</label>
                        <div class="col-md-7">
                            <input style="background-color:#ffffff;" id="name" type="text" class="form-control" name="name" value="<?php echo e($customer->name); ?>" readonly autofocus>
                        </div>
                    </div>

                    <div class="form-group" id="email">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                        <div class="col-md-7">
                            <input style="background-color:#ffffff;" id="email" type="email" class="form-control" name="email" value="<?php echo e($customer->email); ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group" id="address">
                        <label for="address" class="col-md-4 control-label">Address</label>
                        <div class="col-md-7">
                            <textarea style="background-color:#ffffff;" rows="4" id="address" type="text" class="form-control" name="address"readonly><?php echo e($customer->address); ?></textarea>
                        </div>
                    </div>

                    <div class="form-group" id="contact">
                        <label for="contact" class="col-md-4 control-label">Contact</label>
                        <div class="col-md-7">
                            <input style="background-color:#ffffff;" id="contact" type="text" class="form-control" name="contact" value="<?php echo e($customer->contact); ?>" readonly>
                        </div>
                    </div>

                     <div class="form-group" id="active">
                        <label class="control-label col-sm-4">Status :</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="active" name="active" value="<?php echo e($customer->active); ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group" id="created_at">
                        <label class="control-label col-sm-4">Created At:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="created_at" name="created_at" value="<?php echo e($customer->created_at); ?>" readonly>
                        </div>
                    </div>
                
                    <div class="form-group" id="updated_at">
                        <label class="control-label col-sm-4">Last Updated:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="updated_at" name="updated_at" value="<?php echo e($customer->updated_at); ?>" readonly>
                        </div>
                    </div>
                </div>                
                <div class="panel-footer clearfix">  
                    <button type="button" data-dismiss="modal" class="btn btn-danger pull-right" style="margin-right: 10px;">
                        <i class="fa fa-times-circle" aria-hidden="true"></i> Dismiss
                    </button>
                </div>
            </form>
        </div>            
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>