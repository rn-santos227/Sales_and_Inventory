@foreach($customers as $customer)
<div class="modal fade modalMolder" id="view{{$customer->id}}" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <div class="panel-heading">View customer</div>
            <form class="form-horizontal" method="POST" action="/customers">
                {{ csrf_field() }}
                <div class="panel-body">      
                    <div class="form-group" id="name">
                        <label for="name" class="col-md-4 control-label">Name</label>
                        <div class="col-md-7">
                            <input style="background-color:#ffffff;" id="name" type="text" class="form-control" name="name" value="{{$customer->name}}" readonly autofocus>
                        </div>
                    </div>

                    <div class="form-group" id="email">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                        <div class="col-md-7">
                            <input style="background-color:#ffffff;" id="email" type="email" class="form-control" name="email" value="{{$customer->email}}" readonly>
                        </div>
                    </div>

                    <div class="form-group" id="address">
                        <label for="address" class="col-md-4 control-label">Address</label>
                        <div class="col-md-7">
                            <textarea style="background-color:#ffffff;" rows="4" id="address" type="text" class="form-control" name="address"readonly>{{$customer->address}}</textarea>
                        </div>
                    </div>

                    <div class="form-group" id="contact">
                        <label for="contact" class="col-md-4 control-label">Contact</label>
                        <div class="col-md-7">
                            <input style="background-color:#ffffff;" id="contact" type="text" class="form-control" name="contact" value="{{$customer->contact}}" readonly>
                        </div>
                    </div>

                     <div class="form-group" id="active">
                        <label class="control-label col-sm-4">Status :</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="active" name="active" value="{{$customer->active}}" readonly>
                        </div>
                    </div>

                    <div class="form-group" id="created_at">
                        <label class="control-label col-sm-4">Created At:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="created_at" name="created_at" value="{{$customer->created_at}}" readonly>
                        </div>
                    </div>
                
                    <div class="form-group" id="updated_at">
                        <label class="control-label col-sm-4">Last Updated:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="updated_at" name="updated_at" value="{{$customer->updated_at}}" readonly>
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