<div class="modal fade modalMolder" id="update" role="dialog" >
    <div class="modal-dialog">
<<<<<<< HEAD
        <div class="panel panel-default"> 
        
                <div class="panel-heading">Edit Category</div>
            <form class="form-horizontal" id="update-form">
=======
        <div class="panel panel-default">
            <div class="panel-heading">Edit Category</div>
            <form class="form-horizontal" method="POST" action="/categories/{{ $category->id }}">
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

                <!-- Setting Method type to PUT needed for the Update Function -->
                {{ method_field('PUT')  }}

                <!-- CSRF Tokens needed for Cross-Site Request Forgery(CSRF) Protection/Prevention -->
                {{ csrf_field() }}
                
                <div class="panel-body">
<<<<<<< HEAD
=======

                    <!-- Update Field for Category Reference Code -->
                    <div class="form-group{{ $errors->has('ref_code') ? ' has-error' : '' }}">
                        <label for="ref_code" class="col-md-4 control-label">Reference Code</label>

                        <div class="col-md-6">
                            <input id="update-ref_code" type="text" class="form-control" name="ref_code" value="{{$category->ref_code}}" required autofocus>
                            <strong id="update-ref_code_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                    
                    <!-- Update Field for Category Name -->
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
<<<<<<< HEAD
                            <input id="update-name" type="text" class="form-control" name="name" required>
=======
                            <input id="update-name" type="text" class="form-control" name="name" value="{{$category->name}}" required autofocus>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                            <strong id="update-name_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

<<<<<<< HEAD
                    <!-- Update Field for Category Reference Code -->
                    <!-- <div class="form-group{{ $errors->has('ref_code') ? ' has-error' : '' }}">
                        <label for="ref_code" class="col-md-4 control-label">Reference Code</label>

                        <div class="col-md-6"> -->
                            <input id="update-ref_code" type="hidden" class="form-control" name="ref_code" required>
                            <!-- <strong id="update-ref_code_message" style="color:#FF0000;"></strong>
                        </div>
                    </div> -->

=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                    <!-- Update Field for Category Description -->
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-4 control-label">Description</label>

                        <div class="col-md-6">
<<<<<<< HEAD
                            <textarea rows="4" id="update-description" type="text" class="form-control" name="description">
=======
                            <textarea rows="4" id="update-description" type="text" class="form-control" name="description" required>{{$category->description}}
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                            </textarea>
                            <strong id="update-description_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
                    
                    <!-- Update Field for Category Status -->
                    <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                        <label for="active" class="col-md-4 control-label">Discount Status</label>
                        <div class="col-md-6">
                            <select id="update-active" type="text" class="form-control" name="active" required>
<<<<<<< HEAD
                                <option>Active</option>
                                <option>Inactive</option>
=======
                                @if($category->active == "Active")
                                    <option selected>Active</option>
                                    <option>Inactive</option>
                                @else
                                    <option>Active</option>
                                    <option selected>Inactive</option>
                                @endif
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                            </select>
                            <strong id="update-active_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
                </div>

<<<<<<< HEAD
                <!-- Submit and Dismiss Buttons -->
                <div class="panel-footer clearfix">  
                    <button type="button" class="btn btn-primary pull-right update" id="update-submit" style="margin-right: 10px;">
                        <i class="fa fa-check-circle" aria-hidden="true"></i> Submit
                    </button>
                    <button type="button" data-dismiss="modal" class="btn btn-danger pull-right dismiss" style="margin-right: 10px;">
                        <i class="fa fa-times-circle" aria-hidden="true"></i> Dismiss
                    </button>
                </div>               
=======
                    <!-- Submit and Dismiss Buttons -->
                <div class="panel-footer clearfix">  
                    <button type="submit" class="btn btn-primary pull-right" style="margin-right: 10px;">
                        <i class="fa fa-check-circle" aria-hidden="true"></i> Submit
                    </button>
                    <button type="button" data-dismiss="modal" class="btn btn-danger pull-right" style="margin-right: 10px;">
                        <i class="fa fa-times-circle" aria-hidden="true"></i> Dismiss
                    </button>
                </div>
                
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
            </form>
        </div>            
    </div>
</div>