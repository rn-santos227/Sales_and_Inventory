<<<<<<< HEAD
<div class="modal fade modalMolder" id="view" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
                <div class="panel-heading">View discount</div>
            <form class="form-horizontal">
                {{ csrf_field() }}
                <div class="panel-body">    
                    
                    <!-- View Field for Discount Reference Code -->
                    <div class="form-group" id="name">
                        <label class="control-label col-sm-4">Discount Name:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="view-name" name="name" readonly>
                        </div>
                    </div>
                    
                    <!-- View Field for Discount Name -->
                    <div class="form-group" id="ref_code">
                        <label class="control-label col-sm-4">Discount Code:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="view-ref_code" name="ref_code" readonly>
                        </div>
                    </div>

                    <!-- View Field for Discount Rate -->
                    <div class="form-group" id="rate">
                        <label class="control-label col-sm-4">Discount Rate:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="view-rate" name="rate" readonly>
                        </div>
                    </div>

                    <!-- View Field for Discount Description -->
                    <div class="form-group" id="description">
                        <label class="control-label col-sm-4">Discount Description:</label>
                        <div class="col-sm-7">
                            <textarea style="background-color:#ffffff;" class="form-control" placeholder="No Available Description" rows="5" id="view-description" name="description" readonly></textarea>
                        </div>
                    </div>

                    <!-- View Field for Discount Status -->
                    <div class="form-group" id="active">
                        <label class="control-label col-sm-4">Discount Status:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="view-active" name="active"  readonly>
                        </div>
                    </div>

                    <!-- View Field for Discount Created_At -->
                    <div class="form-group" id="created_at">
                        <label class="control-label col-sm-4">Created At:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="view-created_at" name="created_at" readonly>
                        </div>
                    </div>
                
                    <!-- View Field for Discount Updated_At -->
                    <div class="form-group" id="updated_at">
                        <label class="control-label col-sm-4">Last Updated:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="view-updated_at" name="updated_at" readonly>
                        </div>
                    </div>
                </div>


                <!-- Submit and Dismiss Buttons -->
                <div class="panel-footer clearfix">
                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"></i> Dismiss</button>
=======
@foreach($discounts as $discount)
<div class="modal fade modalMolder" id="view{{$discount->id}}" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <form class="form-horizontal" method="POST" action="/discounts">
            {{ csrf_field() }}
                <div class="panel-heading">View discount</div>
                <div class="panel-body">    
                    <div class="form-group" id="ref_code">
                        <label for="ref_code" class="col-md-4 control-label">Reference Code</label>
                        <div class="col-md-7">
                            <input style="background-color:#ffffff;" id="ref_code" type="text" class="form-control" name="ref_code" value="{{$discount->ref_code}}" readonly>
                        </div>
                    </div>
                    
                    <div class="form-group" id="name">
                        <label for="name" class="col-md-4 control-label">Name</label>
                        <div class="col-md-7">
                            <input style="background-color:#ffffff;" id="name" type="text" class="form-control" name="name" value="{{$discount->name}}" readonly>
                        </div>
                    </div>

                    <div class="form-group" id="rate">
                        <label for="rate" class="col-md-4 control-label">Rate</label>
                        <div class="col-md-7">
                            <input style="background-color:#ffffff;" id="rate" type="number" class="form-control" name="rate" value="{{$discount->rate}}" readonly>
                        </div>
                    </div>

                    <div class="form-group" id="description">
                        <label for="description" class="col-md-4 control-label">Description</label>
                        <div class="col-md-7">
                            <textarea style="background-color:#ffffff;" rows="4" id="description" type="text" class="form-control" name="description" readonly>{{$discount->description}}</textarea>
                        </div>
                    </div>

                    <div class="form-group" id="active">
                        <label class="control-label col-sm-4">Status:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="activa" name="active" value="{{$discount->active}}" readonly>
                        </div>
                    </div>

                    <div class="form-group" id="created_at">
                        <label class="control-label col-sm-4">Created At:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="created_at" name="created_at" value="{{$discount->created_at}}" readonly>
                        </div>
                    </div>
                
                    <div class="form-group" id="updated_at">
                        <label class="control-label col-sm-4">Last Updated:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="updated_at" name="updated_at" value="{{$discount->updated_at}}" readonly>
                        </div>
                    </div>
                </div>
                <div class = "panel-footer clearfix">
                    <button type="submit" data-dismiss="modal" class="btn btn-danger pull-right" style="margin-right: 10px">
                        <i class="fa fa-times-circle" aria-hidden="true"></i> Dismiss
                    </button>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                </div>
            </form>
        </div>            
    </div>
<<<<<<< HEAD
</div>
=======
</div>
@endforeach
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
