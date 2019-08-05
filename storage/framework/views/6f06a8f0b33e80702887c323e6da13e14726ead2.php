<div class="modal fade modalMolder" id="create" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <div class="panel-heading">Create Customer</div>
            <form class="form-horizontal" method="POST" action="/customers">
                <?php echo e(csrf_field()); ?>


                <div class="panel-body">
                    <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input id="add-name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>
                            <strong id="add-name_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="add-email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>
                            <strong id="add-email_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                        <label for="address" class="col-md-4 control-label">Address</label>

                        <div class="col-md-6">
                            <textarea rows="4" id="add-address" type="text" class="form-control" name="address" required>
                            </textarea>
                            <strong id="add-address_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
                    
                    <div class="form-group<?php echo e($errors->has('contact') ? ' has-error' : ''); ?>">
                        <label for="contact" class="col-md-4 control-label">Contact</label>

                        <div class="col-md-6">
                            <input id="add-contact" type="text" class="form-control" name="contact" required>
                            <strong id="add-contact_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <input type="hidden" value="Active" name="active" id="add-active"> 
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
