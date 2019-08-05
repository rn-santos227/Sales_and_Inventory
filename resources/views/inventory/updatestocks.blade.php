<div class="modal fade" id="updateStocks" role="dialog" >
	<div class="modal-dialog panel-dialog">
		<div class="panel panel-primary">
	      	<div class="panel-heading">Update Stocks</div>
	      	<div class="panel-body" clearfix><div id="text_primary"></div>
	      		<div class="form-group">
                	<input type="text" id="updateStockstxtid">
                	<input type="text" id="updateStockstxtref_code">
                	<label class="pull-left" id="updateStocksLblRefCode" style="font-size: 10px;"></label>
                    <input type="number" id="updateStocksnewStocks" min="0" value="0" class="form-control" style="width: 100%; margin-bottom: 1%;">
                    <textarea rows="3" maxlength="140" class="form-control" id="updateStocksComment" placeholder="Enter your reason for this action..."></textarea>
                </div>

                <div class="row">
                	<!-- <label class="pull-left" id="updateStockslblid" style="margin-left: 15px;">ID</label> -->

			        <button id="btnUpdateStocks" type="button" data-dismiss="modal" class="btn btn-md btn-primary pull-right" style="margin-right: 15px;">
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