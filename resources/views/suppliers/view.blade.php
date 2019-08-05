<<<<<<< HEAD
<div class="modal fade modalMolder" id="view" role="dialog" >
    <div class="modal-dialog" style="background-color:#ffffff;">
        <form class="form-horizontal">
            <div class="modal-header headerMolder">
                <h4 class="modal-title"><p>Product Information Panel </p></h4>
            </div>
            <div class="modal-body">

                <div class="form-group" id="name">
                    <label class="control-label col-sm-4">Supplier Name:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-name" name="name" readonly>
                    </div>
                </div>

                <div class="form-group" id="ref_code">
                    <label class="control-label col-sm-4">Supplier Code:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-ref_code" name="ref_code" readonly>
=======
@foreach($suppliers as $supplier)
<div class="modal fade modalMolder" id="view{{$supplier->id}}" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <form class="form-horizontal" method="POST" action="/suppliers">
                <div class="panel-heading">View Supplier</div>
                <div class="panel-body">
                    
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('ref_code') ? ' has-error' : '' }}">
                            <label for="ref_code" class="col-md-4 control-label">Reference Code</label>

                            <div class="col-md-6">
                                <input style="background-color:#ffffff;" id="ref_code" type="text" class="form-control" name="ref_code" value="{{$supplier->ref_code}}" readonly autofocus>

                                @if ($errors->has('ref_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ref_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input style="background-color:#ffffff;" id="name" type="text" class="form-control" name="name" value="{{$supplier->name}}" readonly autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                    </div>
                </div>

<<<<<<< HEAD
                <div class="form-group" id="email">
                    <label class="control-label col-sm-4">Supplier Email:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-email" name="email" readonly>
=======
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input style="background-color:#ffffff;" id="email" type="email" class="form-control" name="email" value="{{$supplier->email}}" readonly>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                    </div>
                </div>

<<<<<<< HEAD
                <div class="form-group" id="cotact">
                    <label class="control-label col-sm-4">Supplier Contact:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-contact" name="contact" readonly>
=======
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="address" class="col-md-4 control-label">Address</label>

                        <div class="col-md-6">
                            <textarea style="background-color:#ffffff;" rows="4" id="address" type="text" class="form-control" name="address"readonly>{{$supplier->address}}
                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                            </textarea>
                        </div>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                    </div>
                </div>

<<<<<<< HEAD
                <div class="form-group" id="addres">
                    <label class="control-label col-sm-4">Supplier Address:</label>
                    <div class="col-sm-7">
                        <textarea style="background-color:#ffffff;" class="form-control" placeholder="No Available Address" rows="5" id="view-address"   name="address" readonly></textarea>
=======
                    <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                        <label for="contact" class="col-md-4 control-label">Contact</label>

                        <div class="col-md-6">
                            <input style="background-color:#ffffff;" id="contact" type="text" class="form-control" name="contact" value="{{$supplier->contact}}" readonly>

                            @if ($errors->has('contact'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('contact') }}</strong>
                                </span>
                            @endif
                        </div>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                    </div>
                </div>

<<<<<<< HEAD
                <div class="form-group" id="description">
                    <label class="control-label col-sm-4">Supplier Description:</label>
                    <div class="col-sm-7">
                        <textarea style="background-color:#ffffff;" class="form-control" placeholder="No Available Description" rows="5" id="view-description"   name="description" readonly></textarea>
=======
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-4 control-label">Description</label>

                        <div class="col-md-6">
                            <textarea style="background-color:#ffffff;" rows="4" id="description" type="text" class="form-control" name="description" readonly>{{$supplier->description}}

                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                            </textarea>
                        </div>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                    </div>
                </div>

<<<<<<< HEAD
                <div class="form-group" id="active">
                    <label class="control-label col-sm-4">Product Status:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-active" name="active"  readonly>
=======
                    <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                        <label for="contact" class="col-md-4 control-label">Status</label>

                        <div class="col-md-6">
                            <select style="background-color:#ffffff;" id="active" type="text" class="form-control" name="active" readonly disabled>
                                @if($supplier->active == "Active")
                                    <option selected>Active</option>
                                    <option>Inactive</option>
                                @else
                                    <option>Active</option>
                                    <option selected>Inactive</option>
                                @endif
                            </select>
                            @if ($errors->has('contact'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('contact') }}</strong>
                                </span>
                            @endif
                        </div>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                    </div>
                </div>

<<<<<<< HEAD
                <div class="form-group" id="created_at">
                    <label class="control-label col-sm-4">Created At:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-created_at" name="created_at" readonly>
                    </div>
                </div>
                
                <div class="form-group" id="updated_at">
                    <label class="control-label col-sm-4">Last Updated:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-updated_at" name="updated_at" readonly>
                    </div>
                </div>
            </div>
            <div class="panel-footer clearfix">
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"></i> Dismiss</button>
            </div>
        </form>
=======
                    <div class="form-group" id="created_at">
                        <label class="control-label col-sm-4">Created At:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="created_at" name="created_at" value="{{$supplier->created_at}}" readonly>
                        </div>
                    </div>

                    <div class="form-group" id="updated_at">
                        <label class="control-label col-sm-4">Last Updated:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="updated_at" name="updated_at" value="{{$supplier->updated_at}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="panel-footer clearfix">
                    <button type="submit" data-dismiss="modal" class="btn btn-danger pull-right">
                        <i class="fa fa-times-circle" aria-hidden="true"></i> Dismiss
                    </button>
                </div>
            </form>
        </div>            
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    </div>
</div>