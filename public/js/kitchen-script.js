$(document).ready(function() {
	//Variable Functions
<<<<<<< HEAD
	var mode;

	function getMode() {
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       		}
    	})
		$.ajax({
			type: 'POST',
			url: '/kitchen/getmode',
			success: function(response) {
				console.log('success!');
				mode = response.mode;						
			},
			error: function(response) {
				console.log('error!');
			}
		})
	}

	var getOrders = function() {
=======
	var getOrders = function() {
		setsCSRFToken();
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
		$.ajax({
			type: 'POST',
			url: '/kitchen/load',
			success: function(response) {
<<<<<<< HEAD
				// console.log('success!');
=======
				console.log('success!');
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
				var ids = response.receipt_ids;
				var orders = response.orders;
				$('#kitchen').empty();

				for(var i in ids) {
					$('#kitchen').append(orderBuilder(ids[i], orders));
				}
				setTimeout(getOrders, 1000);
<<<<<<< HEAD

=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
			},
			error: function(response) {
				console.log('error!');
			}
		})
	} 
<<<<<<< HEAD

	//Active Functions
	getMode();	
=======
	
	//Active Functions
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
	getOrders();

	//Event Functions
	$(document).on('click','.respond', function(e) {
<<<<<<< HEAD
=======
		setsCSRFToken();
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
		e.preventDefault();

		var id = $(this).val();

		$.ajax({
			type: 'POST',
			url: '/kitchen/serve',
<<<<<<< HEAD
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	       	},
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
			data: {
				id: id
			},
			success: function(response) {
				console.log('update success!');
			},
			error: function(response) {
				console.log('update fail!');
			}
		})
	});

<<<<<<< HEAD
	$(document).on('click','.btn_serve', function(e) {
		var id = $(this).val();
		console.log(id);
		e.preventDefault();

		$.ajax({
			type: 'POST',
			url: '/kitchen/set',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	       	},
			data: {
				id: id
			},
			success: function(response) {
				console.log('update success!');
			},
			error: function(response) {
				console.log('update fail!');
			}
		})
		
	});

	$(document).on('click','.btn_cancel', function(e) {
		var id = $(this).val();
		console.log(id);
		e.preventDefault();

		$.ajax({
			type: 'POST',
			url: '/kitchen/cancel',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	       	},
			data: {
				id: id
			},
			success: function(response) {
				console.log('update success!');
			},
			error: function(response) {
				console.log('update fail!');
			}
		})
		
	});
=======

	$(document).on('click','.orderitemstatus', function(e) {

		var id = $(this).attr('id');
		alert(id);
		
	});


	//Local Functions
	function setsCSRFToken() {
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       		}
       	})
	}

>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
	//Builders
	function orderBuilder(id, orders) {
		str = '<div class="col-md-4">';
		str += '<div class="panel panel-default">';
		str += '<div class="panel-heading text-center">' + id + '</div>';
		str += '<div class="panel-body">';
		str += '<table class="table table-bordered table-responsive">';
<<<<<<< HEAD
		str += "<thead><th>Name</th><th>Quantity</th><th>Status</th><th class = '"+ (setMode(mode) ? 'hide' : '') +"'>Action</th></thead>";
		str += '<tbody>';
		for(var j in orders) {
			if(orders[j]['receipt_id'] == id)
			{
				if(orders[j]['status'] == 'served')
				{
					str += '<tr><td>' + orders[j]['name'] + '</td><td>' + orders[j]['qty'] + "</td><td style='text-transform: capitalize;'>"+ orders[j]['status']+"</td><td class = '" + (setMode(mode) ? 'hide' : '') + "'><button id="+orders[j]['id']+" class = 'btn btn-danger btn_cancel' value='" + orders[j]['id'] + "'>Cancel</button></td></tr>";
				}
				else
				{
					str += '<tr><td>' + orders[j]['name'] + '</td><td>' + orders[j]['qty'] + "</td><td style='text-transform: capitalize;'>"+ orders[j]['status']+"</td><td class = '" + (setMode(mode) ? 'hide' : '') + "'><button id="+orders[j]['id']+" class = 'btn btn-primary btn_serve' value='" + orders[j]['id'] + "'>Serve</button></td></tr>";
				}
			} 

=======
		str += '<thead><th>Name</th><th>Quantity</th><th>Status</th><th></th></thead>';
		str += '<tbody>';
		for(var j in orders) {
			if(orders[j]['receipt_id'] == id) str += '<tr><td>' + orders[j]['name'] + '</td><td>' + orders[j]['qty'] + "</td><td>"+orders[j]['status']+"</td><td><button  id="+orders[j]['status']+" class = 'btn btn-primary orderitemstatus'>served</button></td></tr>";
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
		}
		str += '</tbody></table>';
		str += '</div>';
		str += '<div class="panel-footer clearfix">';
<<<<<<< HEAD
		str += '<button type="submit" class="btn btn-success pull-right respond ' + (setMode(mode) ? '' : 'hide') + '" style="margin-right: 10px;" value="' + id + '">';
=======
		str += '<button type="submit" class="btn btn-success pull-right respond" style="margin-right: 10px;" value="' + id + '">';
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
		str += '<i class="fa fa-check-circle" aria-hidden="true"></i> Served</button>';
		str += '</div></div></div>';
		return str;
	}
<<<<<<< HEAD

	function setMode(mode) {
		return mode == 'FastFood' ? true : false;
	}
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
});