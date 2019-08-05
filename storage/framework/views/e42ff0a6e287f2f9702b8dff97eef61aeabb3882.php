<div class="modal fade modalMolder" id="create" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <div class="panel-heading">New Product</div>
            <form class="form-horizontal" enctype="multipart/form-data" id="add-form">
                <?php echo e(csrf_field()); ?>

                <div class="panel-body">
                    <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                        <label for="name" class="col-md-4 control-label">Product Name</label>
                        <div class="col-md-7">
                            <input id="add-name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>
                            <strong id="add-name_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
                    
                    <div class="form-group<?php echo e($errors->has('ref_code') ? ' has-error' : ''); ?>">
                        <label for="ref_code" class="col-md-4 control-label">Product Ref. Code</label>
                        <div class="col-md-7">
                            <input id="add-ref_code" type="text" class="form-control" name="ref_code" value="<?php echo e(old('ref_code')); ?>" required>
                            <strong id="add-ref_code_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
                        <label for="image" class="col-md-4 control-label">Product Image</label>
                        <div class="col-md-6">
                            <input type="file" class="btn btn-primary" name="image" id="add-image" value="<?php echo e(old('image')); ?>" accept="image/*">
                            <strong id="add-image_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('category_id') ? ' has-error' : ''); ?>">
                        <label for="category_id" class="col-md-4 control-label">Product Category</label>
                        <div class="col-md-7">
                            <select class="form-control" id="add-category_id" name="category_id" required>
                                <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <option value="0">Default</option>
                                 <?php endif; ?>
                            </select>
                            <strong id="add-category_id_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>


                    <div class="form-group<?php echo e($errors->has('supplier_id') ? ' has-error' : ''); ?>">
                        <label for="supplier_id" class="col-md-4 control-label">Product Supplier</label>
                        <div class="col-md-7">
                            <select class="form-control" id="add-supplier_id" name="supplier_id" required>
                                <?php $__empty_1 = true; $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <option value="<?php echo e($supplier->id); ?>"><?php echo e($supplier->name); ?></option>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <option value="0">Default</option>
                                 <?php endif; ?>
                            </select>
                            <strong id="add-supplier_id_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                        <label for="description" class="col-md-4 control-label">Product Description</label>
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
