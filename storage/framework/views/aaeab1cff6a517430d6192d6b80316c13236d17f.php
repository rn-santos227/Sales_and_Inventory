<div class="modal fade modalMolder" id="update" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
                <div class="panel-heading">Edit Discount</div> 
            <form class="form-horizontal" id="update-form">

                <!-- Setting Method type to PUT needed for the Update Function -->
                <?php echo e(method_field('PUT')); ?>


                <!-- CSRF Tokens needed for Cross-Site Request Forgery(CSRF) Protection/Prevention -->
                <?php echo e(csrf_field()); ?>


                <div class="panel-body">

                    <!-- Update Field for Category Name -->
                    <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                        <label for="name" class="col-md-4 control-label">Discount Name</label>

                        <div class="col-md-6">
                            <input id="update-name" type="text" class="form-control" name="name" required>
                            <strong id="update-name_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
                    
                    <!-- Update Field for Category Reference Code -->
                    <!-- <div class="form-group<?php echo e($errors->has('ref_code') ? ' has-error' : ''); ?>">
                        <label for="ref_code" class="col-md-4 control-label">Discount Ref. Code</label>

                        <div class="col-md-6"> -->
                            <input id="update-ref_code" type="hidden" class="form-control" name="ref_code" required>
                            <!-- <strong id="update-ref_code_message" style="color:#FF0000;"></strong>
                        </div>
                    </div> -->

                    <!-- Update Field for Discout Rate -->
                    <div class="form-group<?php echo e($errors->has('rate') ? ' has-error' : ''); ?>">
                        <label for="rate" class="col-md-4 control-label">Discount Rate</label>

                        <div class="col-md-6">
                            <input id="update-rate" type="text" class="form-control" name="rate" required>
                            <strong id="update-rate_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <!-- Update Field for Category Description -->
                    <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                        <label for="description" class="col-md-4 control-label">Discount Description</label>

                        <div class="col-md-6">
                            <textarea rows="4" id="update-description" type="text" class="form-control" name="description">
                            </textarea>
                            <strong id="update-description_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
                    
                    <!-- Update Field for Category Status -->
                    <div class="form-group<?php echo e($errors->has('active') ? ' has-error' : ''); ?>">
                        <label for="active" class="col-md-4 control-label">Discount Status</label>
                        <div class="col-md-6">
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