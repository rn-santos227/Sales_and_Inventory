<div class="modal fade modalMolder" id="view" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <form class="form-horizontal">
                <?php echo e(csrf_field()); ?>

                <div class="panel-heading">View Employee</div>
                <div class="panel-body">    
                    
                    <!-- View Field for Employee Reference Code -->
                    <div class="form-group" id="name">
                        <label class="control-label col-sm-4">Employee First Name:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="view-first_name" name="first_name" readonly>
                        </div>
                    </div>
                    
                    <!-- View Field for Employee Name -->
                    <div class="form-group" id="ref_code">
                        <label class="control-label col-sm-4">Employee Last Name:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="view-last_name" name="last_name" readonly>
                        </div>
                    </div>

                    <!-- View Field for Employee Rate -->
                    <div class="form-group" id="designation">
                        <label class="control-label col-sm-4">Employee Designation:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="view-designation" name="designation" readonly>
                        </div>
                    </div>

                    <!-- View Field for Employee Description -->
                    <div class="form-group" id="description">
                        <label class="control-label col-sm-4">Employee Description:</label>
                        <div class="col-sm-7">
                            <textarea style="background-color:#ffffff;" class="form-control" placeholder="No Available Description" rows="5" id="view-description" name="description" readonly></textarea>
                        </div>
                    </div>

                    <!-- View Field for Employee Status -->
                    <div class="form-group" id="active">
                        <label class="control-label col-sm-4">Employee Status:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="view-active" name="active"  readonly>
                        </div>
                    </div>

                    <!-- View Field for Employee Created_At -->
                    <div class="form-group" id="created_at">
                        <label class="control-label col-sm-4">Created At:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="view-created_at" name="created_at" readonly>
                        </div>
                    </div>
                
                    <!-- View Field for Employee Updated_At -->
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