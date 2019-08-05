<div class="modal fade" id="updateStatus" role="dialog" >
	<div class="modal-dialog panel-dialog">
		<div class="panel panel-primary">
	      	<div class="panel-heading">Update Status</div>
	      	<div class="panel-body" clearfix><div id="text_primary"></div>
	      		<div class="form-group">
                	<input type="hidden" id="updateStatustxtid">
                	<label class="pull-left" id="lblRefCode" style="font-size: 10px;">REF. CODE: LARA</label>
                    <!-- <input type="number" id="updateStatusnewStatus" min="0" value="0" class="form-control" style="width: 100%;"> -->
                    <select class="form-control" style="width: 100%;" id="updateStatusnewStatus">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <div class="row">
                	<!-- <label class="pull-left" id="updateStatuslblid" style="margin-left: 15px;">ID</label> -->

			        <button id="btnUpdateStatus" type="button" data-dismiss="modal" class="btn btn-md btn-primary pull-right" style="margin-right: 15px;">
			             Submit
			        </button>

	                <button type="button" data-dismiss="modal" class="btn btn-md btn-danger pull-right" style="margin-right: 15px;">
			             Dismiss
			        </button>
                </div>
	        </div>
	    </div>
	</div>
</div>