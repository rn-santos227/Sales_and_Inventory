<div class="modal fade modalMolder" id="update" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <form class="form-horizontal" id="update-form">
                <div class="panel-heading">Edit Employee</div> 

                <!-- Setting Method type to PUT needed for the Update Function -->
                <?php echo e(method_field('PUT')); ?>


                <!-- CSRF Tokens needed for Cross-Site Request Forgery(CSRF) Protection/Prevention -->
                <?php echo e(csrf_field()); ?>


                <div class="panel-body">

                    <!-- Update Field for Employee First Name -->
                    <div class="form-group<?php echo e($errors->has('first_name') ? ' has-error' : ''); ?>">
                        <label for="first_name" class="col-md-4 control-label">First Name</label>

                        <div class="col-md-7">
                            <input id="update-first_name" type="text" class="form-control" name="first_name" required>
                            <strong id="update-first_name_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
                    
                    <!-- Update Field for Employee Last Name -->
                    <div class="form-group<?php echo e($errors->has('first_name') ? ' has-error' : ''); ?>">
                        <label for="last_name" class="col-md-4 control-label">Last Name</label>

                        <div class="col-md-7">
                            <input id="update-last_name" type="text" class="form-control" name="last_name" required>
                            <strong id="update-last_name_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <!-- Update Field for Employee Image -->
                    <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
                        <label for="image" class="col-md-4 control-label">Employee Image</label>
                        <div class="col-md-7">
                            <input type="file" class="btn btn-primary" name="image" id="update-image">
                            <strong id="update-image_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
                    
                    <!-- Update Field for Employee Designation -->
                    <div class="form-group<?php echo e($errors->has('designation') ? ' has-error' : ''); ?>">
                        <label for="designation" class="col-md-4 control-label">Employee Designation</label>
                        <div class="col-md-7">
                            <select class="form-control" id="update-designation" name="designation" required>
                                <option value="Cashier">Cashier</option>                                
                                <option value="Chef">Chef</option>
                                <option value="Manager">Manager</option>
                                <option value="Utilities">Utilities</option>
                                <option value="Waiter">Waiter</option>
                            </select>
                            <strong id="update-designation_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                     <!-- Update Field for Employee Description -->
                    <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                        <label for="description" class="col-md-4 control-label">Employee Description</label>
                        <div class="col-md-7">
                            <textarea rows="4" id="update-description" type="text" class="form-control" name="description"></textarea>
                            <strong id="update-description_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                     <!-- Update Field for Employee Description -->
                    <div class="form-group<?php echo e($errors->has('active') ? ' has-error' : ''); ?>">
                        <label for="active" class="col-md-4 control-label">Product Status</label>

                        <div class="col-md-7">
                            <select id="update-active" type="text" class="form-control" name="active" required>
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                            <strong id="update-active_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
                </div>

                <!-- Submit and Dismiss Buttons -->
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