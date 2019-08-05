<?php $__env->startSection('page'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading"><h4><i class="fa fa-tags" aria-hidden="true"></i> Categories</h4></div>
				<div class="panel-body">
					<!-- Search Panel -->
					<div class="panel search">
						<form>
							<div class="panel-body">
								<div class="input-group">
									<input id="txt_search" type="text" name="search" class="form-control" placeholder="Search For..." value="<?php echo e(old('search')); ?>">
				          		  	<span class="input-group-btn">
				            			<button class="btn btn-primary btn_search" type="button">
				            				<i class="fa fa-search" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Search</span>
				               			</button>
				                		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
				                  			<i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span> <span class="hidden-xs hidden-sm"> New Category</span>
				                		</button>
				                		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#batch">
                                            <i class="fa fa-upload" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Import </span>
                                        </button>
				              		</span>
			              		</div>
							</div>
							<div class="panel-footer" id="accordion" style="padding-left: 30px; padding-right: 30px; ">  							
								<div class="form-group">           
		        					<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2"><i class="fa fa-tags" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">&nbsp;&nbsp;&nbsp;Search By</span></span>
		              					<select id="cbo_tag" class="form-control" aria-describedby="sizing-addon2" name="tag">
		             						<option value="id">ID Number</option>
		                					<option value="ref_code">Category Code</option>
		           					  	  	<option value="name">Category Name</option>
		           					  	  	<option value="description">Category Description</option>
		              					</select>
		          					</div>
		          				</div>		
								
								<div class="form-group">           
		        					<div class="input-group">
											<span class="input-group-addon" id="sizing-addon2"><i class="fa fa-list" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">&nbsp;&nbsp;&nbsp;Sort By</span></span>
		              					<select class="form-control" aria-describedby="sizing-addon2">
											<option>ID</option>
		                					<option>Reference Code</option>
		           					  	  	<option>Name</option>
		           					  	  	<option>Status</option>
		              					</select>
		          					</div>
		          				</div>
 							</div>
 						</form>
					</div>
					<a href="<?php echo e(route('categories/pdf',['download'=>'pdf'])); ?>" class="pull-left"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>&nbsp;
                    <a href="fileentry/dload/phpD0BF.tmp.xlsx"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Download Excel Template</a>
					<div id="product_container">
					<!-- Category Table -->
					<?php echo $__env->make('categories.data', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Child Views -->
<?php echo $__env->make('categories.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('categories.view', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('categories.update', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- Dialog Messages -->
<?php echo $__env->make('dialogs.info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('dialogs.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('dialogs.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- Batch Upload -->
<?php echo $__env->make('batch.batch', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- JavaScript Scripts -->
<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/category-script.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/crud-script.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/pagination.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/batch-script.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>