<div class="modal fade modalMolder" id="create" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <form class="form-horizontal" id="add-form">
                <div class="panel-heading">Add Employee</div>
                <div class="panel-body">

                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <label for="first_name" class="col-md-4 control-label">Employee First Name</label>
                        <div class="col-md-6">
                            <input id="add-first_name" type="text" class="form-control" name="first_name" required autofocus>
                                <strong id="add-first_name_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <label for="last_name" class="col-md-4 control-label">Employee Last Name</label>
                        <div class="col-md-6">
                            <input id="add-last_name" type="text" class="form-control" name="last_name" required autofocus>
                                <strong id="add-first_name_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <label for="image" class="col-md-4 control-label">Employee Image</label>
                        <div class="col-md-6">
                            <input type="file" class="btn btn-primary" name="image" id="add-image" value="{{ old('image') }}" accept="image/*">
                            <strong id="add-image_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
                        <label for="designation" class="col-md-4 control-label">Employee Designation</label>
                        <div class="col-md-6">
                            <select class="form-control" id="add-designation" name="designation" required>
                                <option value="Cashier">Cashier</option>                                
                                <option value="Chef">Chef</option>
                                <option value="Manager">Manager</option>
                                <option value="Utilities">Utilities</option>
                                <option value="Waiter">Waiter</option>
                            </select>
                            <strong id="add-designation_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-4 control-label">Employee Description</label>
                        <div class="col-md-6">
                            <textarea rows="4" id="add-description" type="text" class="form-control" name="description"></textarea>
                            <strong id="add-description_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <input type="hidden" value="Active" name="active" id="add-active">

                </div>

                <!-- Submit and Dismiss Buttons -->
                <div class="panel-footer clearfix">  
                    <button type="button" class="btn btn-primary pull-right add" style="margin-right: 10px;">
                        <i class="fa fa-check-circle" aria-hidden="true"></i> Submit
                    </button>
                    <button type="button" data-dismiss="modal" class="btn btn-danger pull-right dismiss" style="margin-right: 10px;">
                        <i class="fa fa-times-circle" aria-hidden="true"></i> Dismiss
                    </button>
                </div>
            </form>
        </div>            
    </div>
</div>
