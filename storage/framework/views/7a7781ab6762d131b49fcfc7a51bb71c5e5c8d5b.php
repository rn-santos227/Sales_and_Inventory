<div class="modal fade" id="batch" role="dialog" >
	<div class="modal-dialog panel-dialog">
		<form class="form-horizontal" enctype="multipart/form-data" id="batch-form">
			<div class="panel panel-success" style="border-color: #8eb4cb;">
		      	<div class="panel-heading" style="color: white; background-color: #2ab27b; font-size: 13px; font-weight: bold;"><i class="fa fa-upload" aria-hidden="true"></i> Batch Upload</div>
	      		<div class="panel-body" clearfix>
                    <div class="form-group<?php echo e($errors->has('excel') ? ' has-error' : ''); ?>">
                        <label for="excel" class="col-md-3 control-label">Excel File: </label>
                        <div class="col-md-8">
                            <input type="file" class="btn btn-success" name="excel" id="excel" value="<?php echo e(old('excel')); ?>">
                            <span class="help-block"><strong id="batch-file_message" style="color:#FF0000;"></strong></span>
                        </div>
                    </div>
	      		</div>
	      		<div class="panel-footer clearfix">
	      			<button type="button" class="btn btn-md btn-success pull-right" id="batch-submit" style="width: 80px; margin-right: 10px;">
			             Submit
			        </button> &nbsp;&nbsp;
			        
			        <button type="button" data-dismiss="modal" class="btn btn-md btn-danger pull-right" id="batch-cancel" style="width: 80px; margin-right: 10px;">
			             Cancel
			        </button>
	      		</div>
		    </div>
		</form>
	</div>
</div>