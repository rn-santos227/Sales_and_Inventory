$(document).ready(function() {
	//Auto-Launch Functions
	$(getTotal());

	//Event Functions

	$(document).on('click', '.addToTray', function(e) {
		setsCSRFToken(e);
		var menu_id = $(this).attr('id');
		var menu_name = $(':hidden#name' + menu_id).val();
		var menu_price = $(':hidden#price' + menu_id).val();

        $.ajax({
        	type: 'POST',
        	url: '/restaurant/add',
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
        		getTotal();
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
			url: 'restaurant/delete/',
			data: {
        		id: order_id,
        	},
			success: function(data) {
				console.log('success!');
				$('#order' + order_id).remove();
				getTotal();
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
			url: '/restaurant',
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
				changedue: $('#cashier-change_due').val() 
			},
			success: function(response) {
				console.log('success!');
				clearTray(e);
				$('#cashier').modal('toggle');
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
			url: 'restaurant/clear',
			success: function(data) {
				console.log('success!');
				$('#tray tbody').empty();
				getTotal();
			},
			error: function(data) {
				console.log('error!');
			}
		})
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
			url: 'restaurant/update/',
			data: {
        		id: id,
        		price: subtotal,
        		quantity: count,
        	},
			success: function(data) {
				console.log('success!');		
				$('#count' + id).val(count);
				$('#subtotal' + id).text(subtotal.toFixed(2));
				getTotal();
			},
			error: function(data) {
        		console.log('error!');
        	}
		})
	}

	function getTotal() {
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       		}
       	})
		$.ajax({
			type: 'POST',
			url: 'restaurant/total',
			success: function(response) {
				console.log('success!');
				var subtotal = response.total;
				var vatable = response.setting.vatable;
				var tax_rate = response.setting.tax_rate;

				$('#receipt-subtotal').val(subtotal.toFixed(2));
				$('#receipt-count').val(response.count);
				$('#cashier-count').val(response.count);
				$('#receipt-vatable').val(response.setting.non_vat == 1? subtotal.toFixed(2) : (Number(subtotal) / Number(vatable)).toFixed(2));
				$('#receipt-vat').val((Number(subtotal) * Number(tax_rate)).toFixed(2));
				getDiscount(0);
			},
			error: function(data) {
        		console.log('error!');
        	}
		})
	}

	function getDiscount(discount) {
		var amount = $('#receipt-subtotal').val();
		$('#receipt-discount').val(discount > 0 ? ((Number(discount) / 100) * Number(amount)).toFixed(2) : discount.toFixed(2));
		$('#receipt-exempted').val((Number($('#receipt-vatable').val()) - Number($('#receipt-discount').val())).toFixed(2));

		$('#receipt-vat_sales').val((Number($('#receipt-exempted').val()) - Number($('#receipt-vat').val())).toFixed(2));
		$('#receipt-amount_due').val(Number($('#receipt-exempted').val()).toFixed(2));
		$('#cashier-amount_due').val(Number($('#receipt-exempted').val()).toFixed(2));
		$('#cashier-cash').val(Number(0).toFixed(2));	
		$('#cashier-change_due').val(Number(0).toFixed(2));		

		$('#btn_discount').text(discount + '% ').append('<span class="caret"></span>');
		$('#cashier-submit').prop('disabled', true);
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