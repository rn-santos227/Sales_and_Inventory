<div class="modal fade modalMolder" id="view" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <form class="form-horizontal">
                {{ csrf_field() }}
                <div class="panel-heading">View Promo</div>
                <div class="panel-body">    
                    
                    <!-- View Field for Promo Reference Code -->
                    <div class="form-group" id="name">
                        <label class="control-label col-sm-4">Promo Name:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="view-name" name="name" readonly>
                        </div>
                    </div>
                    
                    <!-- View Field for Promo Name -->
                    <div class="form-group" id="ref_code">
                        <label class="control-label col-sm-4">Promo Code:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="view-ref_code" name="ref_code" readonly>
                        </div>
                    </div>

                    <!-- View Field for Promo Type -->
                    <div class="form-group field_value" id="type">
                        <label class="control-label col-sm-4">Promo Type:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="view-type" name="type" readonly>
                        </div>
                    </div>                    

                    <!-- View Field for Promo Rate -->
                    <div class="form-group " id="value">
                        <label class="control-label col-sm-4">Promo Value:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="view-value" name="value" readonly>
                        </div>
                    </div>

                    <!-- View Field for Promo Expiration Date -->
                    <div class="form-group" id="expiration_date">
                        <label class="control-label col-sm-4">Promo Expiration Date:</label>
                        <div class="col-sm-7">
                             <input style="background-color:#ffffff;" type="text" class="form-control" id="view-expiration_date" name="expiration_date" readonly>
                        </div>
                    </div>

                    <!-- View Field for Promo Description -->
                    <div class="form-group" id="description">
                        <label class="control-label col-sm-4">Promo Description:</label>
                        <div class="col-sm-7">
                            <textarea style="background-color:#ffffff;" class="form-control" placeholder="No Available Description" rows="5" id="view-description" name="description" readonly></textarea>
                        </div>
                    </div>

                    <!-- View Field for Promo Status -->
                    <div class="form-group" id="active">
                        <label class="control-label col-sm-4">Promo Status:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="view-active" name="active"  readonly>
                        </div>
                    </div>

                    <!-- View Field for Promo Created_At -->
                    <div class="form-group" id="created_at">
                        <label class="control-label col-sm-4">Created At:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="view-created_at" name="created_at" readonly>
                        </div>
                    </div>
                
                    <!-- View Field for Promo Updated_At -->
                    <div class="form-group" id="updated_at">
                        <label class="control-label col-sm-4">Last Updated:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="view-updated_at" name="updated_at" readonly>
                        </div>
                    </div>
                </div>


                <!-- Submit and Dismiss Buttons -->
                <div class="panel-footer clearfix">
                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"></i> Dismiss</button>
                </div>
            </form>
        </div>            
    </div>
</div>