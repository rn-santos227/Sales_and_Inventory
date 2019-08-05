<div class="modal fade modalMolder" id="create" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <div class="panel-heading">Add Category</div>
<<<<<<< HEAD
            <form class="form-horizontal" id="add-form">
                <!-- CSRF Tokens needed for Cross-Site Request Forgery(CSRF) Protection/Prevention -->
                {{ csrf_field() }}

                <div class="panel-body">
=======
            <form class="form-horizontal" method="POST" action="/categories">

                <!-- CSRF Tokens needed for Cross-Site Request Forgery(CSRF) Protection/Prevention -->
                {{ csrf_field() }}

                <div class="panel-body">

                    <!-- Input field for Category Name -->
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

                    <!-- Input field for Category Name -->
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Category Name</label>
                        <div class="col-md-6">
                            <input id="add-name" type="text" class="form-control" name="name" required autofocus>
                            <strong id="add-name_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <!-- Input field for Category Reference Code -->
                    <div class="form-group{{ $errors->has('ref_code') ? ' has-error' : '' }}">
                        <label for="ref_code" class="col-md-4 control-label">Category Ref. Code</label>
                        <div class="col-md-6">
                            <input id="add-ref_code" type="text" class="form-control" name="ref_code" required autofocus>
                            <strong id="add-ref_code_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <!-- Input field for Category Description -->
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-4 control-label">Category Description</label>

                        <div class="col-md-6">
                            <textarea rows="4" id="add-description" type="text" class="form-control" name="description"></textarea>
                            <strong id="add-description_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
                </div>

                <!-- Submit and Dismiss Buttons -->
                <div class="panel-footer clearfix">  
<<<<<<< HEAD
                    <button type="button" class="btn btn-primary pull-right add" style="margin-right: 10px;">
                        <i class="fa fa-check-circle" aria-hidden="true"></i> Submit
                    </button>
                    <button type="button" data-dismiss="modal" class="btn btn-danger pull-right dismiss" style="margin-right: 10px;">
=======
                    <button type="submit" class="btn btn-primary pull-right" style="margin-right: 10px;">
                        <i class="fa fa-check-circle" aria-hidden="true"></i> Submit
                    </button>
                    <button type="button" data-dismiss="modal" class="btn btn-danger pull-right" style="margin-right: 10px;">
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                        <i class="fa fa-times-circle" aria-hidden="true"></i> Dismiss
                    </button>
                </div>
                
            </form>
        </div>            
    </div>
</div>
