<?php $__env->startSection('page'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><i class="fa fa-truck" aria-hidden="true"></i> Sales Reports</h4></div>
            <div class="panel-body">
                <ul class="nav nav-tabs">
				  <li><a href="/salesreports/salesactivities">Sales Activity</a></li>
				  <li><a href="/salesreports/sellingitems">Top/Worst Selling Items</a></li>
				  <!-- <li><a href="/salesreports/grossprofits">Gross Profits</a></li> -->
                  <li class="active"><a href="/salesreports/salesanalysis">Sales Analysis</a></li>
                  <li><a href="/salesreports/voidreports">Void</a></li>
				</ul>

                <br>
                <div class="row">
                    <div class="col-md-12">
                        <form action="/salesreports/salesanalysis/search" method="post" class="form-inline">
                            <?php echo e(csrf_field()); ?>

                            <div class="pull-left">
                                <div class="form-group">
                                    <label>Search by:</label>
                                    <select name="period" id="period" class="form-control periodOption">
                                        <option></option>
                                        <option>Days</option>
                                        <option>Months</option>
                                        <option>Years</option>
                                    </select>
                                </div>
                            </div>

                            <div class="pull-right">
                                <div class="form-group">
                                    <label>From:</label>
                                    <input type="date" name="datefrom" id="datefrom" class="form-control" disabled>
                                </div>

                                <div class="form-group">
                                    <label>To:</label>
                                    <input type="date" name="dateto" id="dateto" class="form-control" disabled>
                                </div>
                                
                                <div class="form-group">
                                    <button id="btnSearchRange" class="btn btn-primary btn-md" type="submit" disabled><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <br>

                <a href="<?php echo e(route('salesreports/salesanalysis/pdf',['download'=>'pdf'])); ?>" class="pull-left"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>
                <br>

                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Total Cost</th>
                            <th>Total Gross Revenue</th>
                            <th>Total Profit</th>
                            <th>Period</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $salesanalysis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $analysis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
                        <tr>
                            <td><?php echo e($analysis->total_cost); ?></td>
                            <td><?php echo e($analysis->total_grossrev); ?></td>
                            <td><?php echo e($analysis->total_profit); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($analysis->created_at)->format($format)); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                    </tbody>
                </table>

                <div class="row" style="padding-bottom: 2%;">
                    <div class="col-md-12 hidden-xs hidden-sm">
                        <canvas id="salesAnalysisChart" style="height: 200px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo e(asset('js/Chart.min.js')); ?>"></script>

<script>
    var periodArray = new Array();
    var profitArray = new Array();
    var costArray = new Array();
    var grossRevArray = new Array();

    <?php $__empty_1 = true; $__currentLoopData = $salesanalysis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $analysis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
    periodArray.push("<?php echo e(\Carbon\Carbon::parse($analysis->created_at)->format($format)); ?>");
    profitArray.push("<?php echo e($analysis->total_profit); ?>");
    costArray.push("<?php echo e($analysis->total_cost); ?>");
    grossRevArray.push("<?php echo e($analysis->total_grossrev); ?>");
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php endif; ?>

    let salesAnalysisChart = document.getElementById('salesAnalysisChart').getContext('2d');

    let barChart = new Chart(salesAnalysisChart, {
        responsive: true,
        type:'bar',
        data:{
            datasets:[{
                label:'Cost',
                data: costArray,
                backgroundColor: 'rgba(73, 187, 235, 0.7)',
                hoverBorderWidth: 1,
                hoverBorderColor: '#000'
            }, {
                label:'Gross Revenue',
                data: grossRevArray,
                backgroundColor: 'rgba(245, 132, 159, 0.7)',
                hoverBorderWidth: 1,
                hoverBorderColor: '#000'
            }, {
                label:'Profit',
                data: profitArray,
                backgroundColor: 'rgba(238, 132, 245, 0.7)',
                hoverBorderWidth: 1,
                hoverBorderColor: '#000'
            }],

            labels: periodArray,
        },
        options:{
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                    }
                }]
            },

            legend:{
                position:'top',
                display:true,
            },

            layout:{
                padding: 0,
            }
        }
    });
</script>


<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/salesanalysis-script.js')); ?>"></script>
<script src="<?php echo e(asset('js/tablesort.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>