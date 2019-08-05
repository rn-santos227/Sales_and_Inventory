<?php $__env->startSection('page'); ?>
<div class="container-fluid">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h4><i class="fa fa-cutlery" aria-hidden="true"></i> Table</h4></div>
                <div class="panel-body">
                    <!-- Search Panel -->
                    <div class="panel search">
                        <div class="panel-body">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Search</span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
                                        <i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span> <span class="hidden-xs hidden-sm"> New Table</span>
                                    </button>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#batch">
                                        <i class="fa fa-upload" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Import </span>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="panel-footer" id="accordion" style="padding-left: 30px; padding-right: 30px; "> 
                            <form class="form-horizontal">
                                <div class="form-group">           
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-tags" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">&nbsp;&nbsp;&nbsp;Search By</span></span>
                                        <select class="form-control" aria-describedby="sizing-addon2">
                                            <option value="id">ID Number</option>
                                            <option value="name">Table Name</option>
                                            <option value="ref_code">Table Code</option>
                                            <option value="description">Table Description</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                            <form class="form-horizontal">
                                <div class="form-group">           
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-list" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">&nbsp;&nbsp;&nbsp;Sort By</span></span>
                                        <select class="form-control" aria-describedby="sizing-addon2">
                                            <option value="id">ID Number</option>
                                            <option value="name">Table Name</option>
                                            <option value="ref_code">Table Code</option>
                                            <option value="description">Table Description<</option>
                                            <option value="create_at">Create 
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <a href="<?php echo e(route('tables/pdf',['download'=>'pdf'])); ?>" class="pull-left"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>&nbsp;
                    <a href="fileentry/dload/php43F1.tmp.xlsx"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Download Excel Template</a>
                    <div id="product_container">
                        <?php echo $__env->make('tables.data', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- Child Views -->
<?php echo $__env->make('tables.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('tables.view', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('tables.update', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- Dialog Messages -->
<?php echo $__env->make('dialogs.info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('dialogs.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('dialogs.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- Batch Account -->
<?php echo $__env->make('batch.batch', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- JavaScript Scripts -->
<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/table-script.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/crud-script.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/pagination.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/batch-script.js')); ?>" type="text/javascript"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>