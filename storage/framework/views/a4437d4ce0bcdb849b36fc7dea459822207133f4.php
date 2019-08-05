
<div class="modal fade modalMolder" id="update" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <div class="panel-heading">Update Company Description</div>
            <form class="form-horizontal" method="POST" action="/company/1" enctype="multipart/form-data">
                <?php echo e(method_field('PUT')); ?>

                <?php echo e(csrf_field()); ?>

                <div class="panel-body">
                    <label>Company Logo</label>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="file" class="btn btn-primary" name="image" id="add-image" value="<?php echo e(old('image')); ?>">
                        </div>
                    </div>
                    <label>Company Name</label>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input id="name" type="text" class="form-control" name="name"  value = "<?php echo e($companies->name); ?>" required autofocus>
                        </div>
                    </div>
                    <label>Company Description</label>
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea rows="5" id="description" type="text" class="form-control" name="description"><?php echo e($companies->description); ?></textarea>
                        </div>
                    </div>
                    <label>Address</label>
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea rows="3" id="address" type="text" class="form-control" name="address"><?php echo e($companies->address); ?></textarea>
                        </div>
                    </div>
                    <label>Contact</label>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input id="contact" type="text" class="form-control" name="contact"  value = "<?php echo e($companies->contact); ?>" required autofocus>
                        </div>
                    </div>
                    <label>Email</label>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control" name="email"  value = "<?php echo e($companies->email); ?>" required autofocus>
                        </div>
                    </div>
                    <label>TIN</label>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input id="TIN" type="text" class="form-control" name="TIN"  value = "<?php echo e($companies->TIN); ?>" required autofocus>
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
