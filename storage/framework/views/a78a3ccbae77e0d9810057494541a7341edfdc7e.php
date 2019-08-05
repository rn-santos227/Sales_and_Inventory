<canvas id="myChart"></canvas>

<script src="<?php echo e(asset('js/Chart.min.js')); ?>"></script>

	<script>
		let myChart = document.getElementById('myChart').getContext('2d');

		let massPopChart = new Chart(myChart, {
			responsive: true,
			type:'line',
			data:{
				labels:['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
				datasets:[{
					label:'Sales',
					data:[
						500,
						304,
						601,
						670,
						912,
						612,
						500
					],
					backgroundColor: 'rgba(129, 207, 238, 1)',
					borderWidth: 1,
					borderColor: '#000',
					hoverBorderWidth: 3,
					hoverBorderColor: '#000'
				}]
			},
			options:{
				scales: {
			        yAxes: [{
			            ticks: {
			                beginAtZero: true,
			            }
			        }]
			    },

				title:{
					display: true,
					text: 'Weekly Sales',
					fontSize: 25
				},

				legend:{
					position:'bottom',
					display:false,
				},

				layout:{
					padding: 50,
				}
			}
		});
	</script>