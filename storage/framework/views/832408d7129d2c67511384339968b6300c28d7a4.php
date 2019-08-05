<div class="modal fade modalMolder" id="update" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Supplier</div>
        <form class="form-horizontal" id="update-form">
            <div class="panel-body">                
                <?php echo e(method_field('PUT')); ?>

                <?php echo e(csrf_field()); ?>


                <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                    <label for="name" class="col-md-4 control-label">Product Name</label>
                    <div class="col-md-6">
                        <input id="update-name" type="text" class="form-control" name="name" required autofocus>
                        <strong id="update-name_message" style="color:#FF0000;"></strong>
                    </div>
                </div>
                
                <div class="form-group<?php echo e($errors->has('ref_code') ? ' has-error' : ''); ?>">
                    <label for="ref_code" class="col-md-4 control-label">Product Ref. Code</label>

                    <div class="col-md-6">
                        <input id="update-ref_code" type="text" class="form-control" name="ref_code" required autofocus>
                        <strong id="update-ref_code_message" style="color:#FF0000;"></strong>
                    </div>
                </div>

                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="update-email" type="email" class="form-control" name="email" required>
                        <strong id="update-email_message" style="color:#FF0000;"></strong>
                    </div>
                </div>

                <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                    <label for="address" class="col-md-4 control-label">Address</label>
                    <div class="col-md-6">
                        <textarea rows="4" id="update-address" type="text" class="form-control" name="address"required>
                        </textarea>
                        <strong id="update-address_message" style="color:#FF0000;"></strong>
                    </div>
                </div>

                <div class="form-group<?php echo e($errors->has('contact') ? ' has-error' : ''); ?>">
                    <label for="contact" class="col-md-4 control-label">Contact</label>

                    <div class="col-md-6">
                        <input id="update-contact" type="text" class="form-control" name="contact" required>
                        <strong id="update-contact_message" style="color:#FF0000;"></strong>
                    </div>
                </div>

                <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                    <label for="description" class="col-md-4 control-label">Description</label>

                    <div class="col-md-6">
                        <textarea rows="4" id="update-description" type="text" class="form-control" name="description">
                        </textarea>
                        <strong id="update-description_message" style="color:#FF0000;"></strong>
                    </div>
                </div>

                <div class="form-group<?php echo e($errors->has('active') ? ' has-error' : ''); ?>">
                    <label for="active" class="col-md-4 control-label">Status</label>

                    <div class="col-md-7">
                        <select id="update-active" type="text" class="form-control" name="active" required>
                            <option selected>Active</option>
                            <option>Inactive</option>
                        </select>
                        <strong id="update-active_message" style="color:#FF0000;"></strong>
                    </div>
                </div>
            </div>
            <div class="panel-footer clearfix">  
                <button type="button" class="btn btn-primary pull-right update" id="update-submit" style="margin-right: 10px;">
                    <i class="fa fa-check-circle" aria-hidden="true"></i> Submit
                </button>
                <button type="button" data-dismiss="modal" class="btn btn-danger pull-right dismiss" style="margin-right: 10px;">
                    <i class="fa fa-times-circle" aria-hidden="true"></i> Dismiss
                </button>
            </div>
        </form>
        </div>            
    </div>
</div>