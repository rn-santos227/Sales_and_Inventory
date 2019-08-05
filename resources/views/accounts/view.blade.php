@foreach($accounts as $account)
<div class="modal fade modalMolder" id="view{{$account->id}}" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <div class="panel-heading">View account</div>
            <form class="form-horizontal" method="POST" action="/accounts">
                {{ csrf_field() }}

                <div class="panel-body">
                    <div class="form-group" id="user_level">
                        <label for="user_level" class="col-md-4 control-label">User Level</label>

                        <div class="col-md-7">
                            <input style="background-color:#ffffff;" id="user_level" type="text" class="form-control" name="user_level" value="{{$account->user_level}}" readonly autofocus>
                        </div>
                    </div>
                    
                    <div class="form-group" id="username">
                        <label for="username" class="col-md-4 control-label">Username</label>

                        <div class="col-md-7">
                            <input style="background-color:#ffffff;" id="username" type="text" class="form-control" name="username" value="{{$account->username}}" readonly autofocus>
                        </div>
                    </div>

                    <div class="form-group" id="first_name">
                        <label for="first_name" class="col-md-4 control-label">First Name</label>

                        <div class="col-md-7">
                            <input style="background-color:#ffffff;" id="first_name" type="text" class="form-control" name="first_name" value="{{$account->first_name}}" readonly autofocus>
                        </div>
                    </div>

                    <div class="form-group" id="last_name">
                        <label for="last_name" class="col-md-4 control-label">Last NAme</label>

                        <div class="col-md-7">
                            <input style="background-color:#ffffff;" id="last_name" type="text" class="form-control" name="last_name" value="{{$account->last_name}}" readonly autofocus>
                        </div>
                    </div>

                    <div class="form-group" id="email">
                        <label class="control-label col-sm-4">Email:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="email" name="email" value="{{$account->email}}" readonly>
                        </div>
                    </div>

                    <div class="form-group" id="active">
                        <label class="control-label col-sm-4">Status:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="active" name="active" value="{{$account->active}}" readonly>
                        </div>
                    </div>

                    <div class="form-group" id="created_at">
                        <label class="control-label col-sm-4">Created At:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="created_at" name="created_at" value="{{$account->created_at}}" readonly>
                        </div>
                    </div>
                
                    <div class="form-group" id="updated_at">
                        <label class="control-label col-sm-4">Last Updated:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="updated_at" name="updated_at" value="{{$account->updated_at}}" readonly>
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