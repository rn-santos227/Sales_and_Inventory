$(document).ready(function(e) {
<<<<<<< HEAD
	//Local Variables
	var fields = ['receipt_id','customer','table_id', 'employee_id'];
	var total;

	//Variable Functions
	var setTrays = function() {
		if ($('#orders').hasClass('in')) {
			$.ajax({
				type: 'POST',
				url: 'restaurant/serve',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		       	},
				data: {
	        		receipt_id: $('#order-receipt_id').val(),
	        	},
				success: function(response) {
					$('#tray tbody').empty();
					$('#serve tbody').empty();

					for(var i in response.pending) {
					$('#tray > tbody:last-child').append(TrayBuilder(
						response.pending[i].id, 
						response.pending[i].name, 
						response.pending[i].qty,
						response.pending[i].price,
					));
					}

					for(var i in response.served) {
					$('#serve > tbody:last-child').append(serveBuilder(
						response.served[i].id, 
						response.served[i].name, 
						response.served[i].qty,
						response.served[i].price,
					));
					}
				},
				error: function() {
	        		console.log('error!');
	        	}
			})
		}
		setTimeout(setTrays, 1000);
	}

	//Auto Load Functions
	//alert($(window).width());

	setTrays();

	//Event Functions

	//Set Tables
	$(document).on('click', '#btn_set', function(e){
		$.ajax({
			type: 'POST',
			url: 'restaurant/set',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	       	},
			data: {
				customer: $('#set-customer').val(),
				table_id: $('#set-table_id').val(),
				employee_id: $('#set-employee_id').val(),
			},
			success: function(response) {
				if(response.success) {
					loadTables(response);
					loadEmployees(response);
					$('#table_list > tbody:last-child').append(RowBuilder(
						response.table.id,
						response.table.receipt_id,
						response.table.name,
						response.table.customer,
						response.table.status,
					));

					resetFields('#set-');
					$('#set-receipt_id').val(response.receipt_id);
					$('#set-customer').val();
				} else {
					console.log('validation failed!');
					confirmValidation(response.errors, '#set-');
				}
			},
			error: function(response) {
				console.log('error!');				
			}
		})
	});

	//Manipulate Orders within a Table
	$(document).on('click', '.btn_order', function(e) {
		$('#tray tbody').empty();
		var id = $(this).val();
		var receipt_id = $('#table_receipt' + id).text();
		$('#order-receipt_id').val(receipt_id);

		$.ajax({
			type: 'POST',
			url: 'restaurant/order',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	       	},
			data: {
				receipt_id: receipt_id,
			},
			success: function(response) {
				console.log('success!');
				getTotal('restaurant/total', $('#order-receipt_id').val());
			},
			error: function(response) {
				console.log('error!');	
				confirmValidation(response.errors, method);		
			}
		})
	});

	//Open Cashier
	$(document).on('click', '.btn_cashier', function(e) {
		var receipt_id =  $('#table_receipt' + $(this).val()).text();
		$('#cashier-cash_message').text('');
		$('#cashier-cash').css('border-color', '#DDDDDD');	
		$('#receipt-id').val(receipt_id);


		if($('#table_status' + $(this).val()).text() == 'occupied') {
			$('#cashier').modal('toggle');
			getTotal('restaurant/total', receipt_id);
		} else {
			$('#dialog-warning').modal('toggle');
			$('#text_warning').text("The Customer hasn't made any orders yet.");
		}
	});

	//Confirmation Cancellation of Order
	$(document).on('click', '.btn_remove', function(e) {
		if($('#table_status' + $(this).val()).text() == 'occupied') {
			$('#dialog-warning').modal('toggle');
			$('#text_warning').text("Receipt cannot be voided.");
		} else {
			$('#dialog-info').modal({
				backdrop: 'static',
				keyboard: false,
			});
			$('#text_info').html("Admin Authentication<br><input type='password' class='form-control' id = 'auth-code'></input>");
			$('#btn_yes').val($(this).val());
		}
	});

	//Cancel Order in Table
	$(document).on('click', '.order-cancel', function(e) {
		var id = $(this).val();
		var receipt_id = $('#table_receipt' + id).text();

		console.log(id);
		$.ajax({
			type: 'POST',
			url: 'restaurant/remove',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	       	},
			data: {
				table_id: id,
				receipt_id: receipt_id,
			},
			success: function(response) {
				console.log('success!');

				loadTables(response);
				loadEmployees(response);
				$('#table_' + id).remove();
				$('#info_1').removeClass('order-cancel');
				$('#dialog-info').modal('toggle');
			},
			error: function(response) {
				console.log('error!');				
			}
		})
	});

	//Add Selected Menus to Tray
	$(document).on('click', '.addToTray', function(e) {
		var menu_id = $(this).attr('id');
		var menu_name = $(':hidden#name' + menu_id).val();
		var menu_price = $(':hidden#price' + menu_id).val();
		console.log($('#order-receipt_id').val());

        $.ajax({
        	type: 'POST',
        	url: 'restaurant/add',
        	headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	       	},
        	data: {
        		id: menu_id,
            	name: menu_name,
            	price: menu_price,
				receipt_id: $('#order-receipt_id').val(),
        	},
        	dataType: 'json',
        	success: function(response) {
        		console.log('success!');
        		getTotal('restaurant/total', $('#order-receipt_id').val());

        		$('#table_status' + response.table.id).text('occupied');
        	},
        	error: function() {
        		console.log('error!');
        	}

        })
	});	

	//Remove Selected Menus to Tray
	$(document).on('click','.removeToTray', function(e) {
		var order_id = $(this).attr('id');
		$.ajax({
			type: 'POST',
			url: 'restaurant/delete/',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	       	},
			data: {
        		id: order_id,
          		receipt_id: $('#order-receipt_id').val(),
        	},
			success: function(data) {
				console.log('success!');
				$('#order' + order_id).remove();
				getTotal('restaurant/total', $('#order-receipt_id').val());
			},
			error: function(data) {
        		console.log('error!');
        	}
		})
	});

	//Increase Quantity
	$(document).on('click', '.plus', function(e) {
		var order_id = $(this).attr('id');
		var count = $('#count' + order_id).val();
		count = Number(count) + 1;
		updateQuantity(count, order_id, 1);
	});

	//Decrease Quantity
	$(document).on('click', '.minus', function(e) {
		var order_id = $(this).attr('id');
		var count = $('#count' + order_id).val();
		if(count > 1) {
			count = Number(count) - 1;
			updateQuantity(count, order_id, -1);
		}
	});

	//Set Discount`
	$(document).on('click', '.compute_discount', function(e) {
		var discount = $(this).data('value');
		getDiscount(discount);
	});

	//Manipulate Quantity via Textbox
	$(document).on('input','.txt_quantity', function(e) {
		var count = $(this).val();
		var order_id = $(this).attr('id')
		order_id = order_id.substr(5, order_id.length - 1);

		if(count === '') count = 1;		
		updateQuantity(count, order_id, e);
	});

	//Admin Authentication
	$(document).on('input', '#auth-code', function(e) {
		$.ajax({
			type: 'POST',
			url: '/restaurant/confirm',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	       	},
	       	data: {
	       		password: $(this).val(),
	       	},
	       	success: function(response) {
	       		if(response.success) $('#btn_yes').addClass('order-cancel');
	       	},
	       	error: function() {
	       		console.log('error!');
	       	}
		})
	});

	//Submit Transaction
	$(document).on('click', '#cashier-submit', function(e) {
		$.ajax({

			type: 'POST',
			url: '/restaurant',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	       	},
			data: {
				receipt_id: $('#receipt-id').val(),
				orders: tableToJson(),
				count: $('#receipt-count').val(),
				subtotal: $('#receipt-subtotal').val(),
				vatable: $('#receipt-vatable').val(),
				vat: $('#receipt-vat').val(),
				vatexepmt: $('#receipt-discount').val(),
				vatsales: $('#receipt-vat_sales').val(),
				amountdue: $('#receipt-amount_due').val(),
				cash: $('#cashier-cash').val(),
				changedue: $('#cashier-change_due').val(),
				service_type: $('#cashier-dn').is(':checked') ? 'Dine-In' : 'Take-Out',
				promo_ref_code: $('#promo_ref_code').val(), 
			},
			success: function(response) {
				if(response.success) {
					console.log('success!');
					$('#cashier').modal('toggle');
					$('#dialog-success').modal('toggle');
					$('#text_success').text('Transaction Successfully Recorded.');
					$('#table_' + response.table.id).remove();
					loadTables(response);
					loadEmployees(response);					
				} else {
					$('#cashier-cash_message').text(response.message);
					$('#cashier-cash').css('border-color', '#FF0000');

				}
			},
			error: function(response) {
				console.log('error!');
			}
		})
	});

	//Add Promos
	$(document).on('input', '#promo-ref_code', function() {
		promo($(this).val(), 'restaurant/promo');		
	});

	//Local Functions

	function confirmValidation(errors, method) {
		$.each(errors, function( key, value) {
			$(method + key).css('border-color', '#FF0000');
			$(method + key + '_message').text(value);
		});
	}

	function resetFields(method) {
		for(var i in fields) {
			$(method + fields[i]).css('border-color', '#DDDDDD');
			$(method + fields[i] + '_message').text('');
		}
	}

	function updateQuantity(count, id, value) {
		var price = $(':hidden#price' + id).val();
		var subtotal = (Number(price) * Number(count)); 
		$.ajax({
			type: 'POST',
			url: 'restaurant/update',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	       	},
			data: {
				value: value,
        		id: id,
        		price: subtotal,
        		quantity: count,
        		receipt_id: $('#order-receipt_id').val(),
        	},
			success: function(data) {
				console.log('success!');		
				$('#count' + id).val(count);
				$('#subtotal' + id).text(subtotal.toFixed(2));
				getTotal('restaurant/total',$('#order-receipt_id').val());
			},
			error: function(data) {
        		console.log('error!');
        	}
		})
	}

	function loadTables(response) {
		$('#set-table_id').empty();

		if(response.vacant.length > 0) {
			for(var i in response.vacant) {
				$('#set-table_id').append($('<option>', {
					value: response.vacant[i].id,
					text : response.vacant[i].name,
				}));
			} 
		} else {
			$('#set-table_id').append('<option value="0">No Available</option>');
		}
	}

	function loadEmployees(response) {
		$('#set-employee_id').empty();

		if(response.employees.length > 0) {
			for(var i in response.employees) {
				$('#set-employee_id').append($('<option>', {
					value: response.employees[i].id,
					text : response.employees[i].last_name + ', ' + response.employees[i].first_name
				}));
			} 
		} else {
			$('#set-employee_id').append('<option value="0">No Available</option>');
		}
	}	

	//Builders
	function RowBuilder(id, receipt_id, table_name, customer, status) {
		var str = '<tr id="table_' + id + '">';
		str += '<td id="table_receipt' + id +'" class="col_hide">' + receipt_id + '</td>';
		str += '<td id="table_name' + id +'">' + table_name + '</td>';
		str += '<td id="table_customer' + id + '" class="col_hide">' + customer + '</td>';
		str += '<td id="table_status' + id + '" class="mobile">' + status + '</td>';
		str += '<td style="width: 180px;">';
		str += '<button class="btn btn-primary action-restaurant btn_order" data-toggle="modal" data-target="#orders" value="'+ id +'"><i class="fa fa-pencil" aria-hidden="true"></i></button> ';
		str += '<button class="btn btn-success action-restaurant btn_cashier" data-toggle="modal" value="' + id + '"><i class="fa fa-money" aria-hidden="true"></i></button> ';
		str += '<button class="btn btn-danger action-restaurant btn_remove" value="' + id + '"><i class="fa fa-trash-o" aria-hidden="true"></i></button>'
		str += '</td></tr>';
		return str;
	}

	function TrayBuilder(id, name, qty, price) {
		var str;
		str = '<tr id="order' + id + '">'
		str += '<td id="order_id' + id + '">' + id + '</td>';
		str += '<td id="order_name' + id +'">' + name + '</td>';
		str += '<td><button type="button" class="btn btn-xs btn-primary plus" style="border-radius: 50%" id="' +  id + '"><i class="fa fa-plus" aria-hidden="true"></i></button>';
		str += ' <input class="txt_quantity" type="number" min="1" value="' + qty + '" id="count' + id + '" style="width:40px;"> ';
		str += '<button type="button" class="btn btn-xs btn-primary minus" style="border-radius: 50%;" id="' +  id + '"><i class="fa fa-minus" aria-hidden="true"></i></button></td>';
		str += '<td><label id="subtotal' + id + '">' + (Number(price) * Number(qty)).toFixed(2) + '</label></td>';
		str += '<td align="center"><input type="hidden" name="deleteid" value="' + id + '"><button type="button" class="btn btn-xs btn-danger removeToTray" style="border-radius: 50%;" id="' + id + '"><i class="fa fa-trash" aria-hidden="true"></i></button><form></td>';
		str += '<tr>'
		return str;
	}

	function serveBuilder(id, name, qty, price) {
		var str;
		str = '<tr id="serve' + id + '">'
		str += '<td id="serve_id' + id + '">' + id + '</td>';
		str += '<td id="serve_name' + id +'">' + name + '</td>';
		str += '<td id="serve_qty' + id + '" >' +  qty + '</td>';
		str += '<td id="serve_subtotal' + id + '">' + (Number(price) * Number(qty)).toFixed(2) + '</td>';
		str += '</tr>'
		return str;
	}

	function tableToJson() {
		var rows = [];
        $('#tray tbody tr').each(function(i, n){
            var $row = $(n);
            var id = $row.find('td:eq(0)').text()
            rows.push({
                id: $row.find('td:eq(0)').text(),
                name: $row.find('td:eq(1)').text(),
                quantity: $('#count' + id).val(),
                price: $(':hidden#price' + id).val(),
                subtotal: $('#subtotal' + id).text(),
            });
        });
		return JSON.stringify(rows);
	}

	
});
=======
	//Auto Load Functions

	//Event Functions

	//Local Functions


	//Builders

});
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
