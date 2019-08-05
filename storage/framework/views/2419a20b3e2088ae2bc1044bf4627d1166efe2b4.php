<?php $__env->startSection('page'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
            	<h4>Profile</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal">
                 <div class="form-group">
                        <label class="control-label col-sm-3" for="tax_rate">Name:</label>
                        <div class="col-sm-4">
                            <input style="text-transform: uppercase; background-color:#ffffff;" type="text" class="form-control" name="system_name" id="system_name" value="<?php echo e(Auth::user()->last_name); ?>, <?php echo e(Auth::user()->first_name); ?>" disabled>
                        </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-sm-3" for="tax_rate">Userame:</label>
                        <div class="col-sm-4">
                            <input style="text-transform: uppercase; background-color:#ffffff;" type="text" class="form-control" name="system_name" id="system_name" value="<?php echo e(Auth::user()->username); ?>" disabled>
                        </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-sm-3" for="tax_rate">Email:</label>
                        <div class="col-sm-4">
                            <input style="text-transform: uppercase; background-color:#ffffff;" type="text" class="form-control" name="system_name" id="system_name" value="<?php echo e(Auth::user()->email); ?>" disabled>
                        </div>
                </div>
                </form>
            </div>           
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>