$(document).ready(function() {
	//Auto-Launch Functions
	$(getTotal('fastfood/total'));

	//Event Functions

	$(document).on('input', '#category', function(e) {
		var category = $(this).val();
		var searchstr = $('#searchstr').val();

		$.ajax({
        	type: 'POST',
        	url: 'fastfood/search',
        	data: {
        		category: category,
            	searchstr: searchstr,
        	},
        	dataType: 'json',
        	success: function(response) {
        		console.log('success!');
        		console.log(response.menus);

        		$('#tray').empty();

        		for (var i = response.menus.length - 1; i >= 0; i--) {
        			$('#tray').append(

        				"<div class='col-md-4 hide-x-bar'>"+
							"<form>"+
								"<div class='panel panel-default'>"+
									"<div class='panel-heading menu-heading'>"+
										"<label>"+response.menus[i].name+"</label>"+
									"</div>"+
									"<div class='panel-body'>"+
										"<img class='img-rounded' src='images/" + getPhoto(response.menus[i].image) + "' width='100%'>"+
										"<label>"+response.menus[i].price+"</label>"+
									"</div>"+
									"<div class='panel-footer clearfix'>"+
										"<center>"+
											"<input type='hidden' name='id'  id='id"+response.menus[i].id+"' value='"+response.menus[i].id+"'>"+
											"<input type='hidden' name='name'  id='name"+response.menus[i].id+"' value='"+response.menus[i].name+"'>"+
											"<input type='hidden' name='price' id='price"+response.menus[i].id+"' value='"+response.menus[i].price+"'>"+
											"<button class='btn btn-xs btn-success addToTray' type='button' id='"+response.menus[i].id+"' ><i class='fa fa-inbox' aria-hidden='true'></i> Add to Tray</button>"+
										"</center>"+
									"</div>"+
								"</div>"+
							"</form>"+
						"</div>"
        				)
        		}
        	},
        	error: function() {
        		console.log('error!');
        	}
        })

	});

	$(document).on('input', '#searchstr', function(e) {
		var category = $('#category').val();
		var searchstr = $(this).val();

		$.ajax({
        	type: 'POST',
        	url: 'fastfood/search',
        	data: {
        		category: category,
            	searchstr: searchstr,
        	},
        	dataType: 'json',
        	success: function(response) {
        		console.log('success!');
        		console.log(response.menus);

        		$('#tray').empty();
        		for (var i = response.menus.length - 1; i >= 0; i--) {
        			$('#tray').append(

        				"<div class='col-md-4 hide-x-bar'>"+
							"<form>"+
								"<div class='panel panel-default'>"+
									"<div class='panel-heading menu-heading'>"+
										"<label>"+response.menus[i].name+"</label>"+
									"</div>"+
									"<div class='panel-body'>"+
										"<img class='img-rounded' src='images/" + getPhoto(response.menus[i].image) + "' width='100%'>"+
										"<label>"+response.menus[i].price+"</label>"+
									"</div>"+
									"<div class='panel-footer clearfix'>"+
										"<center>"+
											"<input type='hidden' name='id'  id='id"+response.menus[i].id+"' value='"+response.menus[i].id+"'>"+
											"<input type='hidden' name='name'  id='name"+response.menus[i].id+"' value='"+response.menus[i].name+"'>"+
											"<input type='hidden' name='price' id='price"+response.menus[i].id+"' value='"+response.menus[i].price+"'>"+
											"<button class='btn btn-xs btn-success addToTray' type='button' id='"+response.menus[i].id+"' ><i class='fa fa-inbox' aria-hidden='true'></i> Add to Tray</button>"+
										"</center>"+
									"</div>"+
								"</div>"+
							"</form>"+
						"</div>"
        				)
        		}
        	},
        	error: function() {
        		console.log('error!');
        	}
        })
		
	});

	$(document).on('click', '.addToTray', function(e) {
		setsCSRFToken(e);
		var menu_id = $(this).attr('id');
		var menu_name = $(':hidden#name' + menu_id).val();
		var menu_price = $(':hidden#price' + menu_id).val();

        $.ajax({
        	type: 'POST',
        	url: 'fastfood/add',
        	data: {
        		id: menu_id,
            	name: menu_name,
            	price: menu_price,
        	},
        	dataType: 'json',
        	success: function(data) {
        		console.log('success!');
        		if ($('table#tray').find('#order'+ menu_id).length > 0) {
 					$('#order' + menu_id).replaceWith(RowBuilder(menu_id, menu_name, Number($('#count' + menu_id).val()) + 1, menu_price));
        		} else {
        			$('#tray > tbody:last-child').append(RowBuilder(menu_id, menu_name, 1, menu_price));
        		}
        		getTotal('fastfood/total');
        	},
        	error: function() {
        		console.log('error!');
        	}

        })

	});

	$(document).on('click','.removeToTray', function(e) {
		setsCSRFToken(e);
		var order_id = $(this).attr('id');

		$.ajax({
			type: 'POST',
			url: 'fastfood/delete/',
			data: {
        		id: order_id,
        	},
			success: function(data) {
				console.log('success!');
				$('#order' + order_id).remove();
				getTotal('fastfood/total');
			},
			error: function(data) {
        		console.log('error!');
        	}
		})
	});

	$(document).on('click', '.plus', function(e) {
		var order_id = $(this).attr('id');
		var count = $('#count' + order_id).val();
		count = Number(count) + 1;
		updateQuantity(count, order_id, e);
	});

	$(document).on('click', '.minus', function(e) {
		var order_id = $(this).attr('id');
		var count = $('#count' + order_id).val();
		if(count > 1) {
			count = Number(count) - 1;
			updateQuantity(count, order_id, e);
		}
	});

	$(document).on('input','.txt_quantity', function(e) {
		var count = $(this).val();
		var order_id = $(this).attr('id')
		order_id = order_id.substr(5, order_id.length - 1);

		if(count === '') count = 1;		
		updateQuantity(count, order_id, e);
	});

	$(document).on('input', '#promo-ref_code', function() {
		promo($(this).val(), 'restaurant/promo');		
	});

	$(document).on('input', '#cashier-cash', function(e) {
		var cash = $(this).val();
		var amount_due = $('#cashier-amount_due').val();
		var change = Number(cash) - Number(amount_due);
		$('#cashier-change_due').val(change.toFixed(2));
		if(change < 0) $('#cashier-submit').prop('disabled', true);
		else $('#cashier-submit').prop('disabled', false);
	});

	$(document).on('click', '.clear', function(e) {
		clearTray(e);
	});

	$(document).on('click', '.compute_discount', function(e) {
		var discount = $(this).data('value');
		getDiscount(discount);
	});

	$(document).on('click', '#cashier-submit', function(e) {
		setsCSRFToken(e);

		$.ajax({
			type: 'POST',
			url: '/fastfood',
			data: {
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
				console.log('success!');
				clearTray(e);
				$('#cashier').modal('toggle');
				$('#dialog-success').modal('toggle');
				$('#text_success').text('Transaction Successfully Recorded.');
			},
			error: function(response) {
				console.log('error!');
			}
		})
	});


	//Local Functions

	function clearTray(e) {
		setsCSRFToken(e);
		$.ajax({
			type: 'POST',
			url: 'fastfood/clear',
			success: function(data) {
				console.log('success!');
				$('#tray tbody').empty();
				getTotal('fastfood/total');
			},
			error: function(data) {
				console.log('error!');
			}
		})
	}

	function getPhoto(photo) {
		return photo != '' ? 'smalls/' + photo : 'defaults/default.png';
	}

	function setsCSRFToken(e) {
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       		}
       	})
       	e.preventDefault();
	}

	function updateQuantity(count, id, e) {
		setsCSRFToken(e);
		var price = $(':hidden#price' + id).val();
		var subtotal = (Number(price) * Number(count));
		$.ajax({
			type: 'POST',
			url: 'fastfood/update/',
			data: {
        		id: id,
        		price: subtotal,
        		quantity: count,
        	},
			success: function(data) {
				console.log('success!');		
				$('#count' + id).val(count);
				$('#subtotal' + id).text(subtotal.toFixed(2));
				getTotal('fastfood/total');
			},
			error: function(data) {
        		console.log('error!');
        	}
		})
	}

	//Builders
	function RowBuilder(id, name, qty, price) {
		var str;
		str = '<tr id="order' + id + '">'
		str += '<td id="order_id' + id + '">' + id + '</td>';
		str += '<td id="order_name' + id +'">' + name + '</td>';
		str += '<td><button type="button" class="btn btn-xs btn-primary plus" style="border-radius: 50%" id="' +  id + '"><i class="fa fa-plus" aria-hidden="true"></i></button>';
		str += ' <input class="txt_quantity" type="number" min="1" value="' + qty + '" id="count' + id + '" style="width:40px;"> ';
		str += '<button type="button" class="btn btn-xs btn-primary minus" style="border-radius: 50%;" id="' +  id + '"><i class="fa fa-minus" aria-hidden="true"></i></button></td>';
		str += '<td><label id="subtotal' + id + '">' + (Number(price) * Number(qty)).toFixed(2) + '</label></td>';
		str += '<td align="center"><form><input type="hidden" name="deleteid" value="' + id + '"><button type="button" class="btn btn-xs btn-danger removeToTray" style="border-radius: 50%;" id="' + id + '"><i class="fa fa-trash" aria-hidden="true"></i></button><form></td>';
		str += '</form></tr>'
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