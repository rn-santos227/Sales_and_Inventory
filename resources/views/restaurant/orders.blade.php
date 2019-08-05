<div class="modal fade" style="position: fixed;" id="orders" role="dialog" >
    <div class="modal-dialog orders-modal">
        <div class="panel panel-default">
            <div class="panel-heading">Orders<button type="button" class="btn btn-danger btn-xs pull-right" data-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"></i> Close</button></div>
            <div class="panel-body">
            	<div class="row">
					<div class="col-md-7">
						<div class="panel panel-default">
							<div class="panel-heading clearfix">
									<div class="col-md-8">
										<input id="searchstr" class="form-control" type="text" placeholder="Search">
									</div>

									<div class="col-md-4">
										<select id="category" class="form-control">

										</select>
									</div>	
							</div>
							<div class="panel-body" style="overflow: scroll; overflow-x: hidden; height:80vh; background-color: #f7f7f7;">
								<form style="margin-bottom: 10%;">
									@include('restaurant.menu')
								</form>

								<div id="tray">	

								</div>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="row clearfix">
									<form class="col-md-12">
										<p class="pull-left">Tray</p>
									</form>
								</div>
							</div>
							<div class="panel-body">
								<h4>Pending</h4>
								@include('restaurant.tray')
								<br>
								<h4>Served</h4>
								@include('restaurant.serve')
							</div>	
							<div class="panel-footer clearfix">
								<br>
								<form class="form-horizontal" >
							       	<div class="form-group">
										<label for="receipt_id" class="col-md-4 control-label">Receipt ID:</label>
										<div class="col-md-8">
											<input style="background-color:#ffffff;" type="text" class="form-control" id="order-receipt_id"  name="receipt_id" readonly>
							                <strong id="set-receipt_id_message" style="color:#FF0000;"></strong>
							            </div>
							        </div>

							       	<div class="form-group">
										<label for="item_count" class="col-md-4 control-label">Item Count:</label>
										<div class="col-md-8">
											<input style="background-color:#ffffff;" type="text" class="form-control" id="order-item_count"  name="item_count" readonly>
							                <strong id="set-customer_message" style="color:#FF0000;"></strong>
							            </div>
							        </div>

									<div class="form-group">
										<label for="subtotal" class="col-md-4 control-label">Subtotal:</label>
										<div class="col-md-8">
											<input style="background-color:#ffffff;" type="text" class="form-control" id="order-subtotal"  name="subtotal" readonly>
							            </div>
							        </div>
						        </form>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
