<?php $__env->startSection('page'); ?>
<div class="container-fluid">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h3><i class="fa fa-truck" aria-hidden="true"></i> Sales Reports</h3></div>
                <div class="panel-body">
                    <ul class="nav nav-tabs">
					  <li class="active"><a href="/salesreports">Sales Activity</a></li>
					  <li><a href="#">Top/Worst Selling Items</a></li>
					  <li><a href="#">Gross Profits</a></li>
					  <li><a href="#">Menu 3</a></li>
					</ul>
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                </div>
            </div>
        </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>