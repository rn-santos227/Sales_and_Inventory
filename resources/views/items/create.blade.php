<div class="modal fade modalMolder" id="create" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <div class="panel-heading">New Product</div>
<<<<<<< HEAD
            <form class="form-horizontal" enctype="multipart/form-data" id="add-form">
=======
            <form class="form-horizontal" enctype="multipart/form-data">
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                {{ csrf_field() }}
                <div class="panel-body">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Product Name</label>
                        <div class="col-md-7">
                            <input id="add-name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            <strong id="add-name_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
                    
                    <div class="form-group{{ $errors->has('ref_code') ? ' has-error' : '' }}">
                        <label for="ref_code" class="col-md-4 control-label">Product Ref. Code</label>
                        <div class="col-md-7">
                            <input id="add-ref_code" type="text" class="form-control" name="ref_code" value="{{ old('ref_code') }}" required>
                            <strong id="add-ref_code_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <label for="image" class="col-md-4 control-label">Product Image</label>
                        <div class="col-md-6">
                            <input type="file" class="btn btn-primary" name="image" id="add-image" value="{{ old('image') }}" accept="image/*">
                            <strong id="add-image_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                        <label for="category_id" class="col-md-4 control-label">Product Category</label>
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

<<<<<<< HEAD

=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                    <div class="form-group{{ $errors->has('supplier_id') ? ' has-error' : '' }}">
                        <label for="supplier_id" class="col-md-4 control-label">Product Supplier</label>
                        <div class="col-md-7">
                            <select class="form-control" id="add-supplier_id" name="supplier_id" required>
                                @forelse($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{ $supplier->name }}</option>
                                 @empty
                                    <option value="0">Default</option>
                                 @endforelse
                            </select>
                            <strong id="add-supplier_id_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-4 control-label">Product Description</label>
                        <div class="col-md-7">
                            <textarea rows="4" id="add-description" type="text" class="form-control" name="description"></textarea>
                            <strong id="add-description_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
<<<<<<< HEAD
                 
                    <input type="hidden" value="Active" name="active" id="add-active">  
                </div>                         
=======

                    <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                        <label for="quantity" class="col-md-4 control-label">Product Quantity</label>
                        <div class="col-md-7">
                            <input id="add-quantity" type="number" min="1" class="form-control" name="quantity" value="{{ old('quantity')}}" required>
                            <strong id="add-quantity_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('cost') ? ' has-error' : '' }}">
                        <label for="cost" class="col-md-4 control-label">Product Cost</label>
                        <div class="col-md-7">
                            <input id="add-cost" type="number" min="1" class="form-control" name="cost" value="{{ old('price') }}" required>
                            <strong id="add-cost_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <label for="price" class="col-md-4 control-label">Product Price</label>
                        <div class="col-md-7">
                            <input id="add-price" type="number" min="1" class="form-control" name="price" value="{{ old('price') }}" required>
                            <strong id="add-price_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>                    
                    <input type="hidden" value="Active" name="active" id="add-active">
                </div> 
                                        
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
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
