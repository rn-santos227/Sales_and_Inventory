<?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade modalMolder" id="update<?php echo e($customer->id); ?>" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <div class="panel-heading">Edit customer</div>
            <form class="form-horizontal" method="POST" action="/customers/<?php echo e($customer->id); ?>">
                <?php echo e(method_field('PUT')); ?>

                <?php echo e(csrf_field()); ?>


                <div class="panel-body">
                    <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input id="update-name" type="text" class="form-control" name="name" value="<?php echo e($customer->name); ?>" required autofocus>
                            <strong id="update-name_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="update-email" type="email" class="form-control" name="email" value="<?php echo e($customer->email); ?>" required>
                            <strong id="update-email_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                        <label for="address" class="col-md-4 control-label">Address</label>

                        <div class="col-md-6">
                            <textarea rows="4" id="update-address" type="text" class="form-control" name="address" required><?php echo e($customer->address); ?>

                            </textarea>
                            <strong id="update-address_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('contact') ? ' has-error' : ''); ?>">
                        <label for="contact" class="col-md-4 control-label">Contact</label>

                        <div class="col-md-6">
                            <input id="update-contact" type="text" class="form-control" name="contact" value="<?php echo e($customer->contact); ?>" required>
                            <strong id="update-contact_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('active') ? ' has-error' : ''); ?>">
                        <label for="contact" class="col-md-4 control-label">Status</label>

                        <div class="col-md-6">
                            <select id="update-active" type="text" class="form-control" name="active" required>    
                                <?php if($customer->active == "Active"): ?>
                                    <option selected>Active</option>
                                    <option>Inactive</option>
                                <?php else: ?>
                                    <option>Active</option>
                                    <option selected>Inactive</option>
                                <?php endif; ?>
                                
                            </select>
                            <strong id="update-active_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
                </div>

                <div class="panel-footer clearfix">  
                    <button type="submit" class="btn btn-primary pull-right" style="margin-right: 10px;">
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>