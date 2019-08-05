<div class="modal fade modalMolder" id="create" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <div class="panel-heading">Add Menu</div>
<<<<<<< HEAD
            <form class="form-horizontal" enctype="multipart/form-data" id="add-form">
=======
            <form class="form-horizontal" method="POST" action="/menus" enctype="multipart/form-data">
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                {{ csrf_field() }}

                <div class="panel-body">

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
<<<<<<< HEAD
                        <label for="name" class="col-md-4 control-label">Menu Name</label>
=======
                        <label for="name" class="col-md-4 control-label">Name</label>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

                        <div class="col-md-7">
                            <input id="add-name" type="text" class="form-control" name="name" required autofocus>
                            <strong id="add-name_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('ref_code') ? ' has-error' : '' }}">
<<<<<<< HEAD
                        <label for="ref_code" class="col-md-4 control-label">Menu Ref. Code</label>
=======
                        <label for="ref_code" class="col-md-4 control-label">Reference Code</label>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

                        <div class="col-md-7">
                            <input id="add-ref_code" type="text" class="form-control" name="ref_code" required>
                            <strong id="add-ref_code_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
<<<<<<< HEAD
                        <label for="image" class="col-md-4 control-label">Menu Image</label>
=======
                        <label for="image" class="col-md-4 control-label"> Image</label>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                        <div class="col-md-6">
                            <input type="file" class="btn btn-primary" name="image" id="add-image" value="{{ old('image') }}">
                            <strong id="add-image_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
<<<<<<< HEAD
                        <label for="category_id" class="col-md-4 control-label">Menu Category</label>
=======
                        <label for="category_id" class="col-md-4 control-label">Category</label>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                        <div class="col-md-7">
                            <select class="form-control" id="add-category_id" name="category_id" required>
                            @forelse($categories as $category)
                                <option value="{{$category->id}}">{{ $category->name }}</option>
                            @empty
                                <option value="0">Default</option>
                            @endforelse
                            </select>
                            <strong id="add-category_id_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
<<<<<<< HEAD
                        <label for="description" class="col-md-4 control-label">Menu Description</label>
=======
                        <label for="description" class="col-md-4 control-label">Description</label>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

                        <div class="col-md-7">
                            <textarea rows="4" id="add-description" type="text" class="form-control" name="description">
                            </textarea>
                            <strong id="add-description_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('cost') ? ' has-error' : '' }}">
<<<<<<< HEAD
                        <label for="cost" class="col-md-4 control-label">Menu Cost</label>
=======
                        <label for="cost" class="col-md-4 control-label">Cost</label>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

                        <div class="col-md-7">
                            <input id="add-cost" type="number" min="1" max="999999" class="form-control" name="cost" required>
                            <strong id="add-cost_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
                

                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
<<<<<<< HEAD
                        <label for="price" class="col-md-4 control-label">Menu Price</label>
=======
                        <label for="price" class="col-md-4 control-label">Price</label>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

                        <div class="col-md-7">
                            <input id="add-price" type="number" min="1" max="999999" class="form-control" name="price" required>
                            <strong id="add-price_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
                </div>
                
<<<<<<< HEAD
                <input type="hidden" value="Active" name="active" id="add-active">  
                <!-- Submit and Dismiss Buttons -->
                <div class="panel-footer clearfix">  
                    <button type="button" class="btn btn-primary pull-right add" style="margin-right: 10px;">
                        <i class="fa fa-check-circle" aria-hidden="true"></i> Submit
                    </button>
                    <button type="button" data-dismiss="modal" class="btn btn-danger pull-right dismiss" style="margin-right: 10px;">
=======

                <div class="panel-footer clearfix">  
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
