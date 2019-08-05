<div class="modal fade" id="download" role="dialog" >
	<div class="modal-dialog panel-dialog" style="width: 300px">
		<form class="form-horizontal">
			<div class="panel panel-success" style="border-color: #8eb4cb;">
		      	<div class="panel-heading" style="color: white; background-color: #2ab27b; font-size: 13px; font-weight: bold;"><i class="fa fa-download" aria-hidden="true"></i> Batch Download</div>
	      		<div class="panel-body clearfix" >
	      			<center>
			        <a href="{{ route('categories-file',['type'=>'xls']) }}"><button type="button" style="width: 200px" class="btn btn-md btn-success">Download Excel xls</button></a> <br><br>
			        <a href="{{ route('categories-file',['type'=>'xlsx']) }}"><button type="button" style="width: 200px" class="btn btn-md btn-success">Download Excel xlsx</button></a> <br><br>
			        <a href="{{ route('categories-file',['type'=>'csv']) }}"><button type="button" style="width: 200px" class="btn btn-md btn-success">Download CSV</button></a>
			        </center>
	      		</div>
	      		<div class="panel-footer clearfix">
			        <button type="button" data-dismiss="modal" class="btn btn-md btn-danger pull-right" id="batch-cancel" style="width: 80px; margin-right: 10px;">
			             Cancel
			        </button>
	      		</div>
		    </div>
		</form>
	</div>
</div>