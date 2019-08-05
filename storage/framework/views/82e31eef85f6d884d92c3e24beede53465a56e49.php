<?php $__env->startSection('page'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><i class="fa fa-database" aria-hidden="true"></i> Database</h4></div>
            <div class="panel-body">
	            <center>
	            	<div class="col-md-6">
	            		<button data-toggle="modal" data-target="#restoreDatabase" style="width: 100%; background-color: <?php echo e(App\Theme::all()->first()->primary); ?>; border-color: <?php echo e(App\Theme::all()->first()->primary); ?>;" class="btn btn-primary btn-lg">RESTORE DATABASE</button>
	            	</div>

	            	<div class="col-md-6">
		            	<form method="POST" action="/database/backupDatabase">
		                    <!-- CSRF Tokens needed for Cross-Site Request Forgery(CSRF) Protection/Prevention -->
		                    <?php echo e(csrf_field()); ?>


		            		<button type="submit" style="width: 100%; background-color: <?php echo e(App\Theme::all()->first()->primary); ?>; border-color: <?php echo e(App\Theme::all()->first()->primary); ?>;" class="btn btn-primary btn-lg">BACKUP DATABASE</button>
		            	</form>
	            	</div>

	            	<p style="text-decoration: underline; font-weight: bold; font-size: 10px; padding-top: 10%;">DATABASE LAST BACK UP: SEPTEMBER 13, 2017</p>
	            </center>

	            <!-- <form class="form-horizontal">
	            	<div class="form-group">
	                    <label class="control-label col-sm-3" for="restore_database">Restore Database:</label>
	                    <div class="col-sm-5">
	                        <input style="background-color: <?php echo e(App\Theme::all()->first()->primary); ?>; color: white;" type="file" class="form-control" name="restore_database" id="restore_database">
	                    </div>
	                </div>
	            </form> -->
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('database.restoredatabase', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>