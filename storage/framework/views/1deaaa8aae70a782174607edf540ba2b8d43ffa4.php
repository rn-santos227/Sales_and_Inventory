<?php $__env->startSection('page'); ?>
<?php if(Auth::user()->user_level == 'Administrator'): ?>
	<div class="container-fluid">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading"><h4><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</h4></div>
				<div class="panel-body">
				<div class="row">
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading text-center">
								<i class="fa fa-calendar" aria-hidden="true"></i> <?php echo e(\Carbon\Carbon::today()->format('F j, Y')); ?>

							</div>
						</div>	
					</div>
				</div>	
					<div class="row text-center">
						<div class="col-md-4">
	       					<div class="panel panel-default anim"  style="color: #ffffff; border-color: #ffffff;">
								<div class="panel-heading" style="background-color: #ff5d6f; border-color: #ff5d6f;">
									<h1 style="color: #ffffff; padding: 0px; margin: 5px;"><i class="fa fa-shopping-cart" aria-hidden="true"></i></h1>
									<p style="color: #ffffff; font-size: 13px; padding: 0px; margin: 0px;">₱ <?php echo e(number_format($totalsales->sales)); ?></p>
								</div>
	       						<div class="panel-footer" style="background-color: #614653;  border-color: #614653; font-size: 10px;  font-weight: bold;">
	       							TOTAL SALES
	       						</div>					
	       					</div>        				
	        			</div>

	        			<div class="col-md-4">
	       					<div class="panel panel-default anim"  style="color: #ffffff; border-color: #ffffff;">
	       						<div class="panel-heading" style="background-color: #bc80ef; border-color: #bc80ef;">
	       							<h1 style="color: #ffffff; padding: 0px; margin: 5px;"><i class="fa fa-exchange" aria-hidden="true"></i></h1>
									<p style="color: #ffffff; font-size: 13px; padding: 0px; margin: 0px;"><?php echo e($transactions->trans); ?></p>
	       						</div>
	       						<div class="panel-footer" style="background-color: #534d6c; border-color: #534d6c; font-size: 10px;  font-weight: bold;">
	       							TRANSACTIONS
	       						</div>					
	       					</div>        				
	        			</div>	
						
						<div class="col-md-4">
	       					<div class="panel panel-warning anim"  style="color: #ffffff; border-color: #ffffff;">
	       						<div class="panel-heading" style="background-color: #49bbeb; border-color: #49bbeb;">
	       							<h1 style="color: #ffffff; padding: 0px; margin: 5px;"><i class="fa fa-money" aria-hidden="true"></i></h1>
									<p style="color: #ffffff; font-size: 13px; padding: 0px; margin: 0px;">₱ <?php echo e(number_format($totalprofit->profit)); ?></p>
	       						</div>
	       						<div class="panel-footer" style="background-color: #3c596c; border-color: #3c596c; font-size: 10px;  font-weight: bold;">
	       							GROSS PROFIT
	       						</div>					
	       					</div>        				
	        			</div>

<!-- 	        			<div class="col-md-3">
	       					<div class="panel panel-danger anim" style="color: #ffffff; border-color: #ffffff;">
	       						<div class="panel-heading" style="background-color: #73d1be; border-color: #73d1be;">
	       							<h1 style="color: #ffffff; padding: 0px; margin: 5px;"><i class="fa fa-bath" aria-hidden="true"></i></h1>
									<p style="color: #ffffff; font-size: 13px; padding: 0px; margin: 0px;">₱ <?php echo e(number_format($totalsales->sales)); ?></p>
	       						</div>
	       						<div class="panel-footer" style="background-color: #455d63; border-color: #455d63; font-size: 10px;  font-weight: bold;">
	       							VAT SALES
	       						</div>					
	       					</div>        				
	        			</div>	 -->
					</div>

					<div class="row" style="padding-bottom: 2%;">
        				<div class="col-md-12">
		                	<canvas id="weeklySalesChart" style="height: 200px;"></canvas>
        				</div>

        				<div class="col-md-3 item_hide">
		                	<canvas id="voidedOrdersChart" style="height: 180px;"></canvas>
        				</div>
        			</div>

        			<div class="row text-center">
        				<div class="col-md-6">
        					<div class="panel panel-default">
        						<div class="panel-heading"><h4 style="font-size: 12px;  font-weight: bold;">TOP ITEMS BY SALES</h4></div>
								<div class="panel-body">
								<table class="table">
									<thead style="font-size: 10px;  font-weight: bold;">
										<th class="text-center">ITEM</th>
										<th class="text-center">QUANTITY</th>
										<th class="text-center">TOTAL</th>
									</thead>
									<tbody>

									</tbody>
	        					</table>
	        					</div>
                            </div>
        				</div>

        				<?php if(App\SystemSetting::all()->first()->system_mode == 'Retailer'): ?>
        				<div class="col-md-6">
        					<div class="panel panel-default">
        						<div class="panel-heading"><h4 style="font-size: 12px;  font-weight: bold;">ITEMS AT CRITICAL LEVEL</h4></div>
								<div class="panel-body">
								<table class="table">
									<thead style="font-size: 10px;  font-weight: bold;"	>
										<th class="text-center">ITEM</th>
										<th class="text-center">QUANTITY</th>
									</thead>
									<tbody>
									<?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
				                        <tr>
				                            <td><a href="/inventory"><?php echo e($product->name); ?></a></td>
				                            <td><?php echo e($product->quantity); ?></td>
				                        </tr>
				                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
				                    <?php endif; ?>
									</tbody>
	        					</table>
	        					</div>
                            </div>
        				</div>
        				<?php endif; ?>
        			</div>
				</div>
			</div>
		</div>
	</div>

    <script src="<?php echo e(asset('js/Chart.min.js')); ?>"></script>

	<script>
		let weeklySalesChart = document.getElementById('weeklySalesChart').getContext('2d');
		let voidedOrdersChart = document.getElementById('voidedOrdersChart').getContext('2d');

		let barChart = new Chart(weeklySalesChart, {
			responsive: true,
			type:'line',
			data:{
				labels:['MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY', 'SUNDAY'],
				datasets:[{
					label:'Sales',
					data:[
						<?php echo e($mondaysales); ?>,
						<?php echo e($tuesdaysales); ?>,
						<?php echo e($wednesdaysales); ?>,
						<?php echo e($thursdaysales); ?>,
						<?php echo e($fridaysales); ?>,
						<?php echo e($saturdaysales); ?>,
						<?php echo e($sundaysales); ?>

					],
					backgroundColor: 'rgba(73, 187, 235, 0.7)',
					hoverBorderWidth: 1,
					hoverBorderColor: '#000'
				}]
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

				title:{
					display: true,
					text: 'DAILY SALES',
					fontSize: 10
				},

				legend:{
					position:'bottom',
					display:false,
				},

				layout:{
					padding: 0,
				}
			}
		});

		let doughnutChart = new Chart(voidedOrdersChart, {
			responsive: true,
			type:'doughnut',
			data:{
				labels:['Successful Orders', 'Voided Orders'],
				datasets:[{
					label:'Count',
					data:[
						500,
						18
					],
					backgroundColor: [
						'rgba(115, 209, 190, 1)',
						'rgba(69, 93, 99, 1)',
					],
					borderWidth: 0,
					hoverBorderWidth: 1,
					hoverBorderColor: 'rgba(69, 93, 99, 1)'
				}]
			},
			options:{
				maintainAspectRatio: false,

				title:{
					display: true,
					text: 'SUCCESSFUL ORDERS',
					fontSize: 10
				},

				legend:{
					position:'bottom',
					display:false,
				},
			}
		});
	</script>
<?php endif; ?>
<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/dashboard.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>