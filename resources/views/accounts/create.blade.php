<div class="modal fade modalMolder" id="create" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
<<<<<<< HEAD
            <div class="panel-heading">Create Account</div>
=======
            <div class="panel-heading">Add Menu</div>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
            <form class="form-horizontal" method="POST" action="/accounts" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="panel-body">
	                <div class="form-group{{ $errors->has('user_level') ? ' has-error' : '' }}">
	                    <label for="user_level" class="col-md-4 control-label">User Level</label>

	                    <div class="col-md-6">

	                        <select id="user_level" name="user_level" class="form-control" >
<<<<<<< HEAD
	                            <option value="Administrator" >Administrator</option>
	                            <option value="Reports" >Report</option>
	                            <option value="Cashier" >Cashier</option>]
	                            <option value="Maintenance" >Maintenance</option>
	                            @if (App\SystemSetting::all()->first()->system_mode == 'Retailer')
	                            <option value="Stock Manager">Stock Manager</option>
	                            @else
	                            <option value="Kitchen">Kitchen</option>
	                            @endif

=======
	                            <option>Administrator</option>
	                            <option>Cashier</option>
	                            <option>Manager</option>
	                            <option>User</option>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
	                        </select>

	                        @if ($errors->has('user_level'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('user_level') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                </div>

	                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
	                    <label for="username" class="col-md-4 control-label">Username</label>

	                    <div class="col-md-6">
	                        <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

	                        @if ($errors->has('username'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('username') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                </div>

	                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
	                    <label for="first_name" class="col-md-4 control-label">First Name</label>

	                    <div class="col-md-6">
	                        <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

	                        @if ($errors->has('first_name'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('first_name') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                </div>

	                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
	                    <label for="last_name" class="col-md-4 control-label">Last Name</label>

	                    <div class="col-md-6">
	                        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

	                        @if ($errors->has('last_name'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('last_name') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                </div>

	                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

	                    <div class="col-md-6">
	                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

	                        @if ($errors->has('email'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('email') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                </div>

	                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	                    <label for="password" class="col-md-4 control-label">Password</label>

	                    <div class="col-md-6">
	                        <input id="password" type="password" class="form-control" name="password" required>

	                        @if ($errors->has('password'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('password') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                </div>

	                <div class="form-group">
	                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

	                    <div class="col-md-6">
	                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
	                    </div>
	                </div>
                </div>

                <div class="panel-footer clearfix">  
                    <button type="submit" class="btn btn-primary pull-right" style="margin-right: 10px;">
                        <i class="fa fa-check-circle" aria-hidden="true"></i> Submit
                    </button>
                    <button type="button" data-dismiss="modal" class="btn btn-danger pull-right" style="margin-right: 10px;">
                        <i class="fa fa-times-circle" aria-hidden="true"></i> Dismiss
                    </button>
                </div>
                
            </form>
        </div>            
    </div>
</div>
