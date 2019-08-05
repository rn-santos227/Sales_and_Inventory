<div class="modal fade modalMolder" id="update" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
<<<<<<< HEAD
        
                <div class="panel-heading">Update Product</div>
                <div class="panel-body">
            <form class="form-horizontal" enctype="multipart/form-data" id="update-form">
            {{ method_field('PUT') }} 
=======
            <form class="form-horizontal" enctype="multipart/form-data">
            {{ method_field('PUT') }} 
                <div class="panel-heading">Register Product</div>
                <div class="panel-body">
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Product Name</label>
                        <div class="col-md-6">
                            <input id="update-name" type="text" class="form-control" name="name" required autofocus>
                            <strong id="update-name_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
                    
<<<<<<< HEAD
                    <!-- <div class="form-group{{ $errors->has('ref_code') ? ' has-error' : '' }}"> -->
                        <!-- <label for="ref_code" class="col-md-4 control-label">Product Ref. Code</label> -->

                        <!-- <div class="col-md-6"> -->
                            <input id="update-ref_code" type="hidden" class="form-control" name="ref_code" required autofocus>
                        <!--     <strong id="update-ref_code_message" style="color:#FF0000;"></strong>
                        </div>
                    </div> -->
=======
                    <div class="form-group{{ $errors->has('ref_code') ? ' has-error' : '' }}">
                        <label for="ref_code" class="col-md-4 control-label">Product Ref. Code</label>

                        <div class="col-md-6">
                            <input id="update-ref_code" type="text" class="form-control" name="ref_code" required autofocus>
                            <strong id="update-ref_code_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <label for="image" class="col-md-4 control-label">Product Image</label>
                        <div class="col-md-6">
                            <input type="file" class="btn btn-primary" name="image" id="update-image">
                            <strong id="update-image_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                        <label for="category_id" class="col-md-4 control-label">Product Category</label>
                        <div class="col-md-6">
                            <select class="form-control" id="update-category_id" name="category_id" required>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{ $category->name }}</option>
                            @endforeach
                            </select>
                            <strong id="update-category_id_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('supplier_id') ? ' has-error' : '' }}">
<<<<<<< HEAD
                        <label for="supplier_id" class="col-md-4 control-label">Product Supplier</label>
                        <div class="col-md-6">
                            <select class="form-control" id="update-supplier_id" name="supplier_id" required>
                                @forelse($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{ $supplier->name }}</option>
                                 @empty
                                    <option value="0">Default</option>
                                 @endforelse
=======
                        <label for="contact" class="col-md-4 control-label">Product Supplier</label>
                        <div class="col-md-6">
                            <select class="form-control" id="update-supplier_id" name="supplier_id" required>
                            @foreach($suppliers as $supplier)
                                <option value="{{$supplier->id}}">{{ $supplier->name }}</option>
                            @endforeach
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                            </select>
                            <strong id="update-supplier_id_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

<<<<<<< HEAD
                    <!-- <div class="form-group{{ $errors->has('reorder_point') ? ' has-error' : '' }}">
                        <label for="reorder_point" class="col-md-4 control-label">Reorder Point</label>

                        <div class="col-md-6">
                            <input id="update-reorder_point" type="number" min="1" max="999999" class="form-control" name="reorder_point" required>
                            <strong id="update-reorder_point_message" style="color:#FF0000;"></strong>
                        </div>
                    </div> -->

=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-4 control-label">Product Description</label>
                        <div class="col-md-6">
                            <textarea rows="4" id="update-description" type="text" class="form-control" name="description"></textarea>
                            <strong id="update-description_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

<<<<<<< HEAD
                    <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                        <label for="active" class="col-md-4 control-label">Product Status</label>

                        <div class="col-md-6">
                            <select id="update-active" type="text" class="form-control" name="active" required>
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                            <strong id="update-active_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
            
=======
                    <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                        <label for="quantity" class="col-md-4 control-label">Product Quantity</label>
                        <div class="col-md-6">
                            <input id="update-quantity" type="number" min="0" max="999999" class="form-control" name="quantity" required>
                            <strong id="update-quantity_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('cost') ? ' has-error' : '' }}">
                        <label for="cost" class="col-md-4 control-label">Product cost</label>
                        <div class="col-md-6">
                            <input id="update-cost" type="number" min="1" max="999999" class="form-control" name="cost" required>
                            <strong id="update-cost_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <label for="price" class="col-md-4 control-label">Product Price</label>
                        <div class="col-md-6">
                            <input id="update-price" type="number" min="1" max="999999" class="form-control" name="price" required>
                            <strong id="update-price_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>                    
                    <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                        <label for="active" class="col-md-4 control-label">Status</label>
                        <div class="col-md-6">
                            <select id="update-active" type="text" class="form-control" name="active" required>    
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                        </div>
                    </div>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                </div>                         
                <div class="panel-footer clearfix">  
                    <button type="button" class="btn btn-primary pull-right update" id="update-submit" style="margin-right: 10px;">
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