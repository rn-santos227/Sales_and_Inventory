<div class="modal fade" id="restoreDatabase" role="dialog" >
	<div class="modal-dialog panel-dialog">
		<div class="panel panel-primary">
	      	<div class="panel-heading">Restore Database</div>
	      	<div class="panel-body" clearfix><div id="text_primary"></div>
		      	<form method="POST" action="/database/restoreDatabase">
		      		<?php echo e(csrf_field()); ?>


		      		<div class="form-group">
		      			<label class="pull-left" style="font-size: 10px;">IMPORT SQL FILE: </label>

                    	<input type="file" class="form-control" name="sqlfile" id="sqlfile" style="width: 100%; margin-bottom: 1%; background-color: <?php echo e(App\Theme::all()->first()->primary); ?>; color: white;">
	                </div>

	                <div class="row">
				        <button type="submit" class="btn btn-md btn-primary pull-right" style="margin-right: 15px;">
				             Submit
				        </button>

		                <button type="dismiss" data-dismiss="modal" class="btn btn-md btn-danger pull-right" style="margin-right: 15px;">
				             Dismiss
				        </button>
	                </div>
                </form>
            </div>
	    </div>
	</div>
</div>