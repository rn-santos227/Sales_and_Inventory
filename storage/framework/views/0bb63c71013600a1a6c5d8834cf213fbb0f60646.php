<div class="modal fade modalMolder" id="view" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
                <div class="panel-heading">View discount</div>
            <form class="form-horizontal">
                <?php echo e(csrf_field()); ?>

                <div class="panel-body">    
                    
                    <!-- View Field for Discount Reference Code -->
                    <div class="form-group" id="name">
                        <label class="control-label col-sm-4">Discount Name:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="view-name" name="name" readonly>
                        </div>
                    </div>
                    
                    <!-- View Field for Discount Name -->
                    <div class="form-group" id="ref_code">
                        <label class="control-label col-sm-4">Discount Code:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="view-ref_code" name="ref_code" readonly>
                        </div>
                    </div>

                    <!-- View Field for Discount Rate -->
                    <div class="form-group" id="rate">
                        <label class="control-label col-sm-4">Discount Rate:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="view-rate" name="rate" readonly>
                        </div>
                    </div>

                    <!-- View Field for Discount Description -->
                    <div class="form-group" id="description">
                        <label class="control-label col-sm-4">Discount Description:</label>
                        <div class="col-sm-7">
                            <textarea style="background-color:#ffffff;" class="form-control" placeholder="No Available Description" rows="5" id="view-description" name="description" readonly></textarea>
                        </div>
                    </div>

                    <!-- View Field for Discount Status -->
                    <div class="form-group" id="active">
                        <label class="control-label col-sm-4">Discount Status:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="view-active" name="active"  readonly>
                        </div>
                    </div>

                    <!-- View Field for Discount Created_At -->
                    <div class="form-group" id="created_at">
                        <label class="control-label col-sm-4">Created At:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="view-created_at" name="created_at" readonly>
                        </div>
                    </div>
                
                    <!-- View Field for Discount Updated_At -->
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