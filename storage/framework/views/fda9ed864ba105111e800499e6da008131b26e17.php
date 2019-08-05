<div class="modal fade modalMolder" id="create" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <div class="panel-heading">New Promo</div>
            <form class="form-horizontal" enctype="multipart/form-data" id="add-form">
                <?php echo e(csrf_field()); ?>

                <div class="panel-body">
                    <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                        <label for="name" class="col-md-4 control-label">Promo Name</label>
                        <div class="col-md-7">
                            <input id="add-name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>
                            <strong id="add-name_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
                    
                    <div class="form-group<?php echo e($errors->has('ref_code') ? ' has-error' : ''); ?>">
                        <label for="ref_code" class="col-md-4 control-label">Promo Ref. Code</label>
                        <div class="col-md-7">
                            <input id="add-ref_code" type="text" class="form-control" name="ref_code" value="<?php echo e(old('ref_code')); ?>" required>
                            <strong id="add-ref_code_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('type') ? ' has-error' : ''); ?>">
                        <label for="type" class="col-md-4 control-label">Promo Type</label>
                        <div class="col-md-7">
                            <select class="form-control field-type" id="add-type" name="type" required>                              
                                <option value="Percentage">Percentage</option>
                                <option value="Deduction">Deduction</option>
                                <option value="Addons">Addons</option>
                            </select>
                            <strong id="add-type_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('value') ? ' has-error' : ''); ?> field_value">
                        <label for="value" class="col-md-4 control-label">Promo Value</label>

                        <div class="col-md-7">
                            <input id="add-value" type="number" min="1" maxlength="3" class="form-control numeric" name="value" required>
                            <strong id="add-value_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('expiration_date') ? ' has-error' : ''); ?>">
                        <label for="expiration_date" class="col-md-4 control-label">Promo Expiration</label>
                        <div class="col-md-7">
                            <input id="add-expiration_date" type="date" class="form-control numeric" name="expiration_date" required>
                            <strong id="add-expiration_date_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>                    

                    <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                        <label for="description" class="col-md-4 control-label">Promo Description</label>
                        <div class="col-md-7">
                            <textarea rows="4" id="add-description" type="text" class="form-control" name="description"></textarea>
                            <strong id="add-description_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
                 
                    <input type="hidden" value="Active" name="active" id="add-active">  
                </div>                         
                <div class="panel-footer clearfix">  
                    <button type="button" class="btn btn-primary pull-right add" style="margin-right: 10px;">
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
