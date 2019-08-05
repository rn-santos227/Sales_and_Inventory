<?php $__env->startSection('page'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><h4>Company Profile</h4></div>
            <div class="container-fluid">
	            <div class="panel-body">
                    <label>Company Name</label><br>
	            	<?php echo e($companies->name); ?><br>
                    <label>Company Description</label>
	                <p align="justify">
                        <?php echo e($companies->description); ?>

					</p>
                    <label>Address</label><br>
                    <?php echo e($companies->address); ?><br>
                    <label>Contact</label><br>
                    <?php echo e($companies->contact); ?><br>
                    <label>Email</label><br>
                    <?php echo e($companies->email); ?><br>
                    <label>TIN</label><br>
                    <?php echo e($companies->TIN); ?><br>

					<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#update">
                        <i class="fa fa-pencil" aria-hidden="true"></i></span> <span class="hidden-xs hidden-sm"></span>
                    </button>
	            </div>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('company.update', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>