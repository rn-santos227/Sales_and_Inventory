<<<<<<< HEAD
<div class="modal fade modalMolder" id="view" role="dialog" >
    <div class="modal-dialog"  style="background-color:#ffffff;">
        <form class="form-horizontal">
            <div class="modal-header headerMolder">
                <h4 class="modal-title"><p>Menu Information Panel </p></h4>
            </div>
            <div class="modal-body">

                <div class="form-group" id="name">
                    <label class="control-label col-sm-4">Menu Name:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-name" name="name" readonly>
                    </div>
                </div>

                <div class="form-group" id="ref_code">
                    <label class="control-label col-sm-4">Menu Code:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-ref_code" name="ref_code" readonly>
                    </div>
                </div>

                <div class="form-group" id="menu_category">
                    <label class="control-label col-sm-4">Menu Category:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-category" name="category" readonly>
                    </div>
                </div>

                <div class="form-group" id="description">
                    <label class="control-label col-sm-4">Menu Description:</label>
                    <div class="col-sm-7">
                        <textarea style="background-color:#ffffff;" class="form-control" placeholder="No Available Description" rows="5" id="view-description"   name="description" readonly></textarea>
                    </div>
                </div>

                <div class="form-group" id="cost">
                    <label class="control-label col-sm-4">Menu Cost:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-cost" name="cost" readonly>
                    </div>
                </div>

                <div class="form-group" id="price">
                    <label class="control-label col-sm-4">Menu Price:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-price" name="price" readonly>
                    </div>
                </div>

                <div class="form-group" id="profit">
                    <label class="control-label col-sm-4">Menu Profit:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-profit" name="price" readonly>
                    </div>
                </div>

                <div class="form-group" id="active">
                    <label class="control-label col-sm-4">Menu Status:</label>
                    <div class="col-sm-7">
                        <input style="background-color:#ffffff;" type="text" class="form-control" id="view-active" name="active"  readonly>
                    </div>
                </div>

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
    </div>
</div>
=======
@foreach($menus as $menu)
<div class="modal fade modalMolder" id="view{{$menu->id}}" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <div class="panel-heading">View menu</div>
            <form class="form-horizontal" method="POST" action="/menus">
                {{ csrf_field() }}

                <div class="panel-body">
                    <div class="form-group" id="ref_code">
                        <label for="ref_code" class="col-md-4 control-label">Reference Code</label>

                        <div class="col-md-7">
                            <input style="background-color:#ffffff;" id="ref_code" type="text" class="form-control" name="ref_code" value="{{$menu->ref_code}}" readonly autofocus>
                        </div>
                    </div>
                    
                    <div class="form-group" id="name">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-7">
                            <input style="background-color:#ffffff;" id="name" type="text" class="form-control" name="name" value="{{$menu->name}}" readonly autofocus>
                        </div>
                    </div>

                    <div class="form-group" id="description">
                        <label for="description" class="col-md-4 control-label">Description</label>

                        <div class="col-md-7">
                            <textarea style="background-color:#ffffff;" rows="4" id="description" type="text" class="form-control" name="description" readonly>{{$menu->description}}</textarea>
                        </div>
                    </div>

                    <div class="form-group" id="cost">
                        <label class="control-label col-sm-4">Cost:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="cost" name="cost" value="{{$menu->cost}}" readonly>
                        </div>
                    </div>

                    <div class="form-group" id="price">
                        <label for="price" class="col-md-4 control-label">Price</label>

                        <div class="col-md-7">
                            <input style="background-color:#ffffff;" id="price" type="text" class="form-control" name="price" value="{{$menu->price}}" readonly autofocus>
                        </div>
                    </div>

                    <div class="form-group" id="category">
                        <label class="control-label col-sm-4">Category:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="category" name="category" value="{{$menu->category->name}}" readonly>
                        </div>
                    </div>

                    <div class="form-group" id="active">
                        <label class="control-label col-sm-4">Status:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="active" name="active" value="{{$menu->active}}" readonly>
                        </div>
                    </div>
                </div>

                <div class="panel-footer clearfix">  
                    <button type="button" data-dismiss="modal" class="btn btn-danger pull-right" style="margin-right: 10px;">
                        <i class="fa fa-times-circle" aria-hidden="true"></i> Dismiss
                    </button>
                </div>

            </form>
        </div>            
    </div>
</div>
@endforeach
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
