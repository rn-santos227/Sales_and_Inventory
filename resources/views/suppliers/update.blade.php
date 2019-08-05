<div class="modal fade modalMolder" id="update" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
        <form class="form-horizontal" method="POST" action="/suppliers/{{ $supplier->id }}">
            <div class="panel-heading">Edit Supplier</div>
<<<<<<< HEAD
        <form class="form-horizontal" id="update-form">
            <div class="panel-body">                
                {{ method_field('PUT')  }}
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Product Name</label>
                    <div class="col-md-6">
                        <input id="update-name" type="text" class="form-control" name="name" required autofocus>
                        <strong id="update-name_message" style="color:#FF0000;"></strong>
                    </div>
                </div>
                
                <div class="form-group{{ $errors->has('ref_code') ? ' has-error' : '' }}">
                    <label for="ref_code" class="col-md-4 control-label">Product Ref. Code</label>

                    <div class="col-md-6">
                        <input id="update-ref_code" type="text" class="form-control" name="ref_code" required autofocus>
                        <strong id="update-ref_code_message" style="color:#FF0000;"></strong>
=======
            <div class="panel-body">
                
                    {{ method_field('PUT')  }}
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('ref_code') ? ' has-error' : '' }}">
                        <label for="ref_code" class="col-md-4 control-label">Reference Code</label>

                        <div class="col-md-6">
                            <input id="update-ref_code" type="text" class="form-control" name="ref_code" value="{{$supplier->ref_code}}" required autofocus>
                            <strong id="update-ref_code_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
                    
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input id="update-name" type="text" class="form-control" name="name" value="{{$supplier->name}}" required autofocus>
                            <strong id="update-name_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="update-email" type="email" class="form-control" name="email" value="{{$supplier->email}}" required>
                            <strong id="update-email_message" style="color:#FF0000;"></strong>
                        </div>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

<<<<<<< HEAD
                    <div class="col-md-6">
                        <input id="update-email" type="email" class="form-control" name="email" required>
                        <strong id="update-email_message" style="color:#FF0000;"></strong>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    <label for="address" class="col-md-4 control-label">Address</label>
                    <div class="col-md-6">
                        <textarea rows="4" id="update-address" type="text" class="form-control" name="address"required>
                        </textarea>
                        <strong id="update-address_message" style="color:#FF0000;"></strong>
=======
                        <div class="col-md-6">
                            <textarea rows="4" id="update-address" type="text" class="form-control" name="address"required>{{$supplier->address}}
                            </textarea>
                            <strong id="update-address_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                        <label for="contact" class="col-md-4 control-label">Contact</label>

                        <div class="col-md-6">
                            <input id="update-contact" type="text" class="form-control" name="contact" value="{{$supplier->contact}}" required>
                            <strong id="update-contact_message" style="color:#FF0000;"></strong>
                        </div>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                    </div>
                </div>

<<<<<<< HEAD
                <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                    <label for="contact" class="col-md-4 control-label">Contact</label>

                    <div class="col-md-6">
                        <input id="update-contact" type="text" class="form-control" name="contact" required>
                        <strong id="update-contact_message" style="color:#FF0000;"></strong>
=======
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-4 control-label">Description</label>

                        <div class="col-md-6">
                            <textarea rows="4" id="update-description" type="text" class="form-control" name="description">{{$supplier->description}}
                            </textarea>
                            <strong id="update-description_message" style="color:#FF0000;"></strong>
                        </div>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                    </div>
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description" class="col-md-4 control-label">Description</label>

<<<<<<< HEAD
                    <div class="col-md-6">
                        <textarea rows="4" id="update-description" type="text" class="form-control" name="description">
                        </textarea>
                        <strong id="update-description_message" style="color:#FF0000;"></strong>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                    <label for="active" class="col-md-4 control-label">Status</label>

                    <div class="col-md-7">
                        <select id="update-active" type="text" class="form-control" name="active" required>
                            <option selected>Active</option>
                            <option>Inactive</option>
                        </select>
                        <strong id="update-active_message" style="color:#FF0000;"></strong>
                    </div>
                </div>
            </div>
            <div class="panel-footer clearfix">  
                <button type="button" class="btn btn-primary pull-right update" id="update-submit" style="margin-right: 10px;">
                    <i class="fa fa-check-circle" aria-hidden="true"></i> Submit
                </button>
                <button type="button" data-dismiss="modal" class="btn btn-danger pull-right dismiss" style="margin-right: 10px;">
=======
                        <div class="col-md-6">

                            <select id="update-active" type="text" class="form-control" name="active" required>    
                                @if($supplier->active == "Active")
                                    <option selected>Active</option>
                                    <option>Inactive</option>
                                @else
                                    <option>Active</option>
                                    <option selected>Inactive</option>
                                @endif         
                            </select>
                            <strong id="update-active_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
                
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