<div class="modal fade modalMolder" id="create" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
<<<<<<< HEAD
                <div class="panel-heading">Create Supplier</div>
            <form class="form-horizontal" id="add-form">
                <div class="panel-body">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Supplier Name</label>
                        <div class="col-md-6">
                            <input id="add-name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            <strong id="add-name_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
                        
                    <div class="form-group{{ $errors->has('ref_code') ? ' has-error' : '' }}">
                        <label for="ref_code" class="col-md-4 control-label">Supplier Ref. Code</label>
                        <div class="col-md-6">
                            <input id="add-ref_code" type="text" class="form-control" name="ref_code" value="{{ old('ref_code') }}" required>
                            <strong id="add-ref_code_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">Supplier E-Mail</label>
                        <div class="col-md-6">
                            <input id="add-email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            <strong id="add-email_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                        <label for="contact" class="col-md-4 control-label">Supplier Contact</label>
                        <div class="col-md-6">
                            <input id="add-contact" type="text" class="form-control" name="contact" required>
                            <strong id="add-contact_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="address" class="col-md-4 control-label">Supplier Address</label>
                        <div class="col-md-6">
                            <textarea rows="4" id="add-address" type="text" class="form-control" name="address" required>
                            </textarea>
                            <strong id="add-address_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-4 control-label">Supplier Description</label>
                        <div class="col-md-6">
                            <textarea rows="4" id="add-description" type="text" class="form-control" name="description" required>
                            </textarea>
                            <strong id="add-description_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>     
                                     
                    <input type="hidden" value="Active" name="active" id="add-active">         
                </div>

                <div class="panel-footer clearfix">
                    <button type="button" class="btn btn-primary pull-right add" style="margin-right: 10px;">
                        <i class="fa fa-check-circle" aria-hidden="true"></i> Submit
                    </button>
                    <button type="button" data-dismiss="modal" class="btn btn-danger pull-right dismiss" style="margin-right: 10px;">
=======
            <form class="form-horizontal" method="POST" action="/suppliers">
                <div class="panel-heading">Create Supplier</div>
                <div class="panel-body">

                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="add-name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                    <strong id="add-name_message" style="color:#FF0000;"></strong>
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('ref_code') ? ' has-error' : '' }}">
                                <label for="ref_code" class="col-md-4 control-label">Reference Code</label>

                                <div class="col-md-6">
                                    <input id="add-ref_code" type="text" class="form-control" name="ref_code" value="{{ old('ref_code') }}" required autofocus>
                                    <strong id="add-ref_code_message" style="color:#FF0000;"></strong>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="add-email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    <strong id="add-email_message" style="color:#FF0000;"></strong>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-md-4 control-label">Address</label>

                                <div class="col-md-6">
                                    <textarea rows="4" id="add-address" type="text" class="form-control" name="address" required>
                                    </textarea>
                                    <strong id="add-address_message" style="color:#FF0000;"></strong>
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                                <label for="contact" class="col-md-4 control-label">Contact</label>

                                <div class="col-md-6">
                                    <input id="add-contact" type="text" class="form-control" name="contact" required>
                                    <strong id="add-contact_message" style="color:#FF0000;"></strong>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <textarea rows="4" id="add-description" type="text" class="form-control" name="description" required>
                                    <strong id="add-description_message" style="color:#FF0000;"></strong>
                                    </textarea>
                                </div>
                            </div>
                            
                            <input type="hidden" value="Active" name="active" id="add-active"> 
                            
                </div>
                <div class="panel-footer clearfix">
                    <button type="submit" class="btn btn-primary pull-right" style="margin-right:10px">
                        <i class="fa fa-check-circle" aria-hidden="true"></i> Submit
                    </button>
                    <button type="submit" data-dismiss="modal" class="btn btn-danger pull-right" style="margin-right:10px">
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                        <i class="fa fa-times-circle" aria-hidden="true"></i> Dismiss
                    </button>
                </div>
            </form>
        </div>            
    </div>
</div>
