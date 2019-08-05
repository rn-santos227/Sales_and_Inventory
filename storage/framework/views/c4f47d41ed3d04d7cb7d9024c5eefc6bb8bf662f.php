<div class="modal fade modalMolder" id="create" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <div class="panel-heading">Create Account</div>
            <form class="form-horizontal" method="POST" action="/accounts" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>


                <div class="panel-body">
	                <div class="form-group<?php echo e($errors->has('user_level') ? ' has-error' : ''); ?>">
	                    <label for="user_level" class="col-md-4 control-label">User Level</label>

	                    <div class="col-md-6">

	                        <select id="user_level" name="user_level" class="form-control" >
	                            <option value="Administrator" >Administrator</option>
	                            <option value="Reports" >Report</option>
	                            <option value="Cashier" >Cashier</option>]
	                            <option value="Maintenance" >Maintenance</option>
	                            <?php if(App\SystemSetting::all()->first()->system_mode == 'Retailer'): ?>
	                            <option value="Stock Manager">Stock Manager</option>
	                            <?php else: ?>
	                            <option value="Kitchen">Kitchen</option>
	                            <?php endif; ?>

	                        </select>

	                        <?php if($errors->has('user_level')): ?>
	                            <span class="help-block">
	                                <strong><?php echo e($errors->first('user_level')); ?></strong>
	                            </span>
	                        <?php endif; ?>
	                    </div>
	                </div>

	                <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
	                    <label for="username" class="col-md-4 control-label">Username</label>

	                    <div class="col-md-6">
	                        <input id="username" type="text" class="form-control" name="username" value="<?php echo e(old('username')); ?>" required autofocus>

	                        <?php if($errors->has('username')): ?>
	                            <span class="help-block">
	                                <strong><?php echo e($errors->first('username')); ?></strong>
	                            </span>
	                        <?php endif; ?>
	                    </div>
	                </div>

	                <div class="form-group<?php echo e($errors->has('first_name') ? ' has-error' : ''); ?>">
	                    <label for="first_name" class="col-md-4 control-label">First Name</label>

	                    <div class="col-md-6">
	                        <input id="first_name" type="text" class="form-control" name="first_name" value="<?php echo e(old('first_name')); ?>" required autofocus>

	                        <?php if($errors->has('first_name')): ?>
	                            <span class="help-block">
	                                <strong><?php echo e($errors->first('first_name')); ?></strong>
	                            </span>
	                        <?php endif; ?>
	                    </div>
	                </div>

	                <div class="form-group<?php echo e($errors->has('last_name') ? ' has-error' : ''); ?>">
	                    <label for="last_name" class="col-md-4 control-label">Last Name</label>

	                    <div class="col-md-6">
	                        <input id="last_name" type="text" class="form-control" name="last_name" value="<?php echo e(old('last_name')); ?>" required autofocus>

	                        <?php if($errors->has('last_name')): ?>
	                            <span class="help-block">
	                                <strong><?php echo e($errors->first('last_name')); ?></strong>
	                            </span>
	                        <?php endif; ?>
	                    </div>
	                </div>

	                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
	                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

	                    <div class="col-md-6">
	                        <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

	                        <?php if($errors->has('email')): ?>
	                            <span class="help-block">
	                                <strong><?php echo e($errors->first('email')); ?></strong>
	                            </span>
	                        <?php endif; ?>
	                    </div>
	                </div>

	                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
	                    <label for="password" class="col-md-4 control-label">Password</label>

	                    <div class="col-md-6">
	                        <input id="password" type="password" class="form-control" name="password" required>

	                        <?php if($errors->has('password')): ?>
	                            <span class="help-block">
	                                <strong><?php echo e($errors->first('password')); ?></strong>
	                            </span>
	                        <?php endif; ?>
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
