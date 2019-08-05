<div class="modal fade modalMolder" id="update" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
                <div class="panel-heading">Edit menu</div>
        
            <form class="form-horizontal" enctype="multipart/form-data" id="update-form">
                <?php echo e(method_field('PUT')); ?>

                <div class="panel-body">
                    <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                        <label for="name" class="col-md-4 control-label">Menu Name</label>
                        <div class="col-md-6">
                            <input id="update-name" type="text" class="form-control" name="name" required autofocus>
                            <strong id="update-name_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
                    
                    <!-- <div class="form-group<?php echo e($errors->has('ref_code') ? ' has-error' : ''); ?>">
                        <label for="ref_code" class="col-md-4 control-label">Menu Ref. Code</label>

                        <div class="col-md-6"> -->
                            <input id="update-ref_code" type="hidden" class="form-control" name="ref_code" required autofocus>
<!--                             <strong id="update-ref_code_message" style="color:#FF0000;"></strong>
                        </div>
                    </div> -->

                    <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
                        <label for="image" class="col-md-4 control-label">Product Image</label>
                        <div class="col-md-6">
                            <input type="file" class="btn btn-primary" name="image" id="update-image">
                            <strong id="update-image_message" style="color:#FF0000;"></strong>
                        </div>
                    </div> 

                    <div class="form-group<?php echo e($errors->has('category_id') ? ' has-error' : ''); ?>">
                        <label for="category_id" class="col-md-4 control-label">Menu Category</label>
                        <div class="col-md-6">
                            <select class="form-control" id="update-category_id]" name="category_id" required>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <strong id="update-category_id_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>               

                    <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                        <label for="description" class="col-md-4 control-label">Menu Description</label>
                        <div class="col-md-6">
                            <textarea rows="4" id="update-description" type="text" class="form-control" name="description"></textarea>
                            <strong id="update-description_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('cost') ? ' has-error' : ''); ?>">
                        <label for="cost" class="col-md-4 control-label">Menu Cost</label>
                        <div class="col-md-6">
                            <input id="update-cost" type="number" class="form-control" min="1" name="cost" required autofocus>
                            <strong id="update-cost_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('price') ? ' has-error' : ''); ?>">
                        <label for="price" class="col-md-4 control-label">Price</label>

                        <div class="col-md-6">
                            <input id="update-price" type="number" class="form-control" min="1" name="price" required autofocus>
                            <strong id="update-price_message" style="color:#FF0000;"></strong>
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