<?php $__env->startSection('page'); ?>
	<div class="container-fluid">
	    <div class="row">
	        <div class="panel panel-default">
	            <div class="panel-heading"><h4><i class="fa fa-users" aria-hidden="true"></i> Accounts</h4></div>
	            <div class="panel-body">
	            <!-- Search Panel -->
					<div class="panel search">
	                    <div class="panel-body">
	                        <div class="input-group">
	                            <input type="text" name="serch" class="form-control" placeholder="Search for..." value="<?php echo e(old('search')); ?>">
	                            <span class="input-group-btn">
	                                <button class="btn btn-primary" type="submit">
	                                    <i class="fa fa-search" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Search</span>
	                                </button>
	                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
	                                    <i class="fa fa-plus-square fa-lg" aria-hidden="true"></i> <span class="hidden-xs hidden-sm"> New Account</span>
	                                </button>
	                            </span>
	                        </div>
	                    </div>
	                    <div class="panel-footer" id="accordion" style="padding-left: 30px; padding-right: 30px; "> 
	                        <form class="form-horizontal">
	                            <div class="form-group">           
	                                <div class="input-group">
	                                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-tags" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">&nbsp;&nbsp;&nbsp;Search By</span></span>
	                                    <select class="form-control" aria-describedby="sizing-addon2" name="tag">
	                                        <option value="id">ID Number</option>
	                                        <option value="ref_code">Menu Code</option>
	                                        <option value="name">Menu Name</option>
	                                        <option value="category">Menu Category</option>
	                                        <option value="description">Menu Description</option>
	                                    </select>
	                                </div>
	                            </div>
	                        </form>
	                        <form class="form-horizontal">
	                            <div class="form-group">           
	                                <div class="input-group">
	                                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-list" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">&nbsp;&nbsp;&nbsp;Sort By</span></span>
	                                    <select class="form-control" aria-describedby="sizing-addon2">
	                                        <option>ID Number</option>
	                                        <option>Menu Code</option>
	                                        <option>Menu Name</option>
	                                        <option>Menu Category</option>
	                                        <option>Date Added</option>
	                                        <option>Last Update</option>
	                                        <option>Price</option>
	                                    </select>
	                                </div>
	                            </div>
	                        </form>
	                    </div>
	                </div>

	                <a href="<?php echo e(route('accounts/pdf',['download'=>'pdf'])); ?>" class="pull-left"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  Download PDF</a>

	                <table class="table table-bordered table-responsive">
						<thead>
							<tr>
								<th>User Level</th>
								<th>Username</th>
								<th class="col_hide">First Name</th>
	                            <th class="col_hide">Last Name</th>
	                            <th class="col_hide">Email</th>
								<th class="col_hide">Status</th>
								<th class="action">Action</th>
							</tr>
						</thead>

						<tbody>
							<?php $__empty_1 = true; $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
								<?php if(Auth::user()->id != $account->id): ?>
								<tr>
									<td><?php echo e($account->user_level); ?></td>
									<td><?php echo e($account->username); ?></td>
	                                <td class="col_hide"><?php echo e($account->first_name); ?></td>
	                                <td class="col_hide"><?php echo e($account->last_name); ?></td>
	                                <td class="col_hide"><?php echo e($account->email); ?></td>
									<td class="col_hide"><?php echo e($account->active); ?></td>
									<td class="action">
									<div class="row">
										<div class="col-md-5">
											<button class="btn btn-primary action" data-toggle="modal" data-target="#view<?php echo e($account->id); ?>"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button>
										</div>

										<div class="col-md-5">
											<!-- Checks wether if the user is active or not to decide which button to show (Block or Unblock) -->
											<?php if($account->active == "Active"): ?>
											<form method="POST" action="/account/block">
								                <?php echo e(method_field('PUT')); ?>

								                <?php echo e(csrf_field()); ?>

								                <input type="hidden" value="<?php echo e($account->id); ?>" name="id" id="id">
								                <input type="hidden" value="<?php echo e($account->username); ?>" name="username" id="username">
			                                 	<button class="btn btn-danger action" type="submit"><i class="fa fa-lock" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Lock</span></button>
			                                 </form>
			                                <?php else: ?>
			                                <form method="POST" action="/account/unblock">
								                <input type="hidden" value="<?php echo e($account->id); ?>" name="id" id="id">
			                               		<?php echo e(method_field('PUT')); ?>

								                <?php echo e(csrf_field()); ?>

								                <input type="hidden" value="<?php echo e($account->id); ?>" name="id" id="id">
								                <input type="hidden" value="<?php echo e($account->username); ?>" name="username" id="username">
			                                	<button class="btn btn-danger action" type="submit"><i class="fa fa-unlock-alt" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Unlock</span></button>
			                                </form>
			                                <?php endif; ?>
										</div>
									</div>
									</td>
								</tr>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
	                            <tr><td colspan="4"><p>No accounts Available</p></td></tr>
	                        <?php endif; ?>
						</tbody>
					</table>
					<center>
						<?php echo e($accounts->links()); ?>

					</center>
	            </div>
	        </div>
	    </div>
	</div>

<?php echo $__env->make('accounts.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('accounts.view', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>