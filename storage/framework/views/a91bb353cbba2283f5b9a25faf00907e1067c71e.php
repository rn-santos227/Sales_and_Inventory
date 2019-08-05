<?php $__env->startSection('content'); ?>

<style>
	body {
		background-color: <?php echo e(App\Theme::all()->first()->primary); ?>;
	}
</style>
<a style="color: #ffffff;" href="<?php echo e(route('logout')); ?>"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
            </a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo e(csrf_field()); ?>

            </form>
<div class="panel panel-default">
	<div class="panel-body" style="overflow: scroll; height:85vh;">
		<div class="row">
			<div id="kitchen">
			</div>
		</div>
	</div>
</div>

<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/kitchen-script.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>