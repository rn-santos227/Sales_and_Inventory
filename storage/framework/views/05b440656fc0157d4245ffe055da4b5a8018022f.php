<?php $__env->startSection('page'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
            	<h4>Profile</h4>
            </div>
            <div class="panel-body">
            	<?php echo e(Auth::user()->last_name); ?>, <?php echo e(Auth::user()->first_name); ?>.
            	<?php echo e(Auth::user()->username); ?>

            	<?php echo e(Auth::user()->email); ?>

            </div>           
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>