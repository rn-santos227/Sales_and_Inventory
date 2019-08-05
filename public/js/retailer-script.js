$(document).ready(function() {
	//Auto-Launch Functions
<<<<<<< HEAD
	$(getTotal('retailer/total'));
=======
	$(getTotal());
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
	$(autoSearch());

	//Event Functions

	$(document).on('click', '.addToCart', function(e) {
		setsCSRFToken(e);
		var item_id = $(this).attr('id');
		var item_name = $('#item_name' + item_id).text();
		var item_price = $('#item_price' + item_id).text();

        $.ajax({
        	type: 'POST',
        	url: '/retailer/add',
        	data: {
        		id: item_id,
            	name: item_name,
            	price: item_price,
        	},
        	dataType: 'json',
        	success: function(data) {
        		console.log('success!');
<<<<<<< HEAD
        		console.log(data.carts);
        		if ($('table#cart').find('#order'+ item_id).length > 0) {
 					$('#order' + item_id).replaceWith(cartBuilder(item_id, item_name, Number($('#count' + item_id).val()) + 1, item_price, data.carts[item_id].max));
        		} else {
        			$('#cart > tbody:last-child').append(cartBuilder(item_id, item_name, 1, item_price, data.carts[item_id].max));
        		}
        		getTotal('retailer/total');
=======
        		if ($('table#cart').find('#order'+ item_id).length > 0) {
 					$('#order' + item_id).replaceWith(cartBuilder(item_id, item_name, Number($('#count' + item_id).val()) + 1, item_price));
        		} else {
        			$('#cart > tbody:last-child').append(cartBuilder(item_id, item_name, 1, item_price));
        		}
        		getTotal();
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        	},
        	error: function() {
        		console.log('error!');
        	}

        })

	});

	$(document).on('input','.txt_quantity', function(e) {
<<<<<<< HEAD
		var order_id = $(this).attr('id').substr(5, $(this).attr('id').length - 1);;
		var max = $(this).attr('max');
		var price = Number($('#subtotal' + order_id).text()) / Number(count);
		var count = $(this).val();

		if(count === '') count = 1;
		else if(count > max) count = max;

		var subtotal = (Number(price) * Number(count));	
=======
		var count = $(this).val();
		var order_id = $(this).attr('id')
		order_id = order_id.substr(5, order_id.length - 1);
		var price = Number($('#subtotal' + order_id).text()) / Number(count);
		if(count === '') count = 1;		
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
		updateQuantity(count, subtotal, order_id, e);
	});

	$(document).on('click', '.plus', function(e) {
		var order_id = $(this).attr('id');
		var count = $('#count' + order_id).val();
<<<<<<< HEAD
		var max = $('#count' + order_id).attr('max');
		if(count < max) {			
			var price = Number($('#subtotal' + order_id).text()) / Number(count);
			count = Number(count) + 1;
			var subtotal = (Number(price) * Number(count));
			updateQuantity(count, subtotal, order_id, e);
		}
=======
		var price = Number($('#subtotal' + order_id).text()) / Number(count);
		count = Number(count) + 1;
		var subtotal = (Number(price) * Number(count));
		updateQuantity(count, subtotal, order_id, e);
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
	});

	$(document).on('click', '.minus', function(e) {
		var order_id = $(this).attr('id');
		var count = $('#count' + order_id).val();
		var price = Number($('#subtotal' + order_id).text()) / Number(count);
		if(count > 1) {
			count = Number(count) - 1;
			var subtotal = (Number(price) * Number(count));
			updateQuantity(count, subtotal, order_id, e);
		}
	});

	$(document).on('input', '#search', function(e) {
		setsCSRFToken(e);
		var search = $(this).val();
		showItem(search);
	});

<<<<<<< HEAD
	$(document).on('input', '#promo-ref_code', function() {
		promo($(this).val(), 'restaurant/promo');		
	});

	$(document).on('click','.removeToTray', function(e) {
=======

	$(document).on('click','.removeToCart', function(e) {
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
		setsCSRFToken(e);
		var order_id = $(this).attr('id');

		$.ajax({
			type: 'POST',
<<<<<<< HEAD
			url: 'retailer/delete',
=======
			url: 'retailer/delete/',
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
			data: {
        		id: order_id,
        	},
			success: function(data) {
				console.log('success!');
				$('#order' + order_id).remove();
<<<<<<< HEAD
				getTotal('retailer/total');
=======
				getTotal();
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
			},
			error: function(data) {
        		console.log('error!');
        	}
		})
	});

<<<<<<< HEAD
=======
	$(document).on('input', '#cashier-cash', function(e) {
		var cash = $(this).val();
		var amount_due = $('#cashier-amount_due').val();
		var change = Number(cash) - Number(amount_due);
		$('#cashier-change_due').val(change.toFixed(2));
		if(change < 0) $('#cashier-submit').prop('disabled', true);
		else $('#cashier-submit').prop('disabled', false);
	});

>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
	$(document).on('click', '.clear', function(e) {
		clearCart(e);
	});

	$(document).on('click', '.compute_discount', function(e) {
		var discount = $(this).data('value');
		getDiscount(discount);
	});

	$(document).on('click', '#cashier-submit', function(e) {
		setsCSRFToken(e);

		$.ajax({
			type: 'POST',
			url: '/retailer',
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
<<<<<<< HEAD
				changedue: $('#cashier-change_due').val(),
				promo_ref_code: $('#promo_ref_code').val(),				 
=======
				changedue: $('#cashier-change_due').val() 
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
			},
			success: function(response) {
				console.log('success!');
				clearCart(e);
				$('#cashier').modal('toggle');
			},
			error: function(response) {
				console.log('error!');
			}
		})
	});

	//Local Functions
	function setsCSRFToken(e) {
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       		}
       	})
       	e.preventDefault();
	}

	function showItem(search) {
		var empty = '<tr><td colspan="4"><p>Catalog is Empty.</p></td></tr>';
		$('#display tbody').empty();
		$.ajax({
			type: 'POST',
        	url: 'retailer/search',
        	data: {
        		search: search
        	},
        	success: function(response) {
        		var items = response.items
        		$('#display tbody').empty();

        		if(items.length > 0){   
					for(var i in items) {
						$('#display > tbody:last-child').append(itemBuilder(items[i]));
					}
				}else{
					$('#display > tbody:last-child').append(empty);
				}

        		console.log('success');
        	},
        	error: function(response) {
        		console.log('error');
        	}
		})
	}

	function autoSearch() {
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       		}
       	})
       	showItem('');		
	}

	function clearCart(e) {
		setsCSRFToken(e);
		$.ajax({
			type: 'POST',
			url: 'retailer/clear',
			success: function(data) {
				console.log('success!');
				$('#cart tbody').empty();
<<<<<<< HEAD
				getTotal('retailer/total');
=======
				getTotal();
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
			},
			error: function(data) {
				console.log('error!');
			}
		})
	}

	function updateQuantity(count, subtotal, id, e) {
		setsCSRFToken(e);
		$.ajax({
			type: 'POST',
			url: 'retailer/update',
			data: {
        		id: id,
        		price: subtotal,
        		quantity: count,
        	},
			success: function(response) {
				console.log('success!');		
				$('#count' + id).val(count);
				$('#subtotal' + id).text(subtotal.toFixed(2));
<<<<<<< HEAD
				getTotal('retailer/total');
=======
				getTotal();
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
			},
			error: function(data) {
        		console.log('error!');
        	}
		})
	}

<<<<<<< HEAD
=======
	function getTotal() {
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       		}
       	})
		$.ajax({
			type: 'POST',
			url: 'retailer/total',
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

>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
	//Builders
	function itemBuilder(item) {
		var str = '<tr id="item_id' + item['id'] + '">';
		str += '<td class="col_hide" id="item_code'+ item['id']+'">' + item['ref_code'] + '</td>';
		str += '<td id="item_name'+ item['id'] +'">' +  item['name'] + '</td>';
		str += '<td id="item_price'+ item['id'] + '">' +  item['price'] + '</td>';
		str += '<td align="center"><button class="btn btn-xs btn-success addToCart" type="button" id="'+item['id']+'" ><i class="fa fa-inbox" aria-hidden="true"></i> Add to Cart</button></td>';
		str += '</tr>';
		return str;
	}

<<<<<<< HEAD
	function cartBuilder(id, name, qty, price, max) {
=======
	function cartBuilder(id, name, qty, price) {
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
		var str;
		str = '<tr id="order' + id + '">'
		str += '<td id="order_id' + id+ '">' + id + '</td>';
		str += '<td id="order_name' + id +'">' + name + '</td>';
		str += '<td><button type="button" class="btn btn-xs btn-primary plus" style="border-radius: 50%" id="' +  id + '"><i class="fa fa-plus" aria-hidden="true"></i></button>';
<<<<<<< HEAD
		str += '<input class="txt_quantity" type="number" min="1" max="' + max + '" value="' + qty + '" id="count' + id + '" style="width:40px;"> ';
=======
		str += '<input class="txt_quantity" type="number" min="1" value="' + qty + '" id="count' + id + '" style="width:40px;"> ';
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
		str += '<button type="button" class="btn btn-xs btn-primary minus" style="border-radius: 50%;" id="' +  id + '"><i class="fa fa-minus" aria-hidden="true"></i></button></td>';
		str += '<td><label id="subtotal' + id + '">' + (Number(price) * Number(qty)).toFixed(2) + '</label></td>';
		str += '<td align="center"><form><input type="hidden" name="deleteid" value="' + id + '"><button type="button" class="btn btn-xs btn-danger removeToTray" style="border-radius: 50%;" id="' + id + '"><i class="fa fa-trash" aria-hidden="true"></i></button><form></td>';
		str += '</form></tr>'
		return str;
	}

	function tableToJson() {
		var rows = [];
        $('#cart tbody tr').each(function(i, n){
            var $row = $(n);
            var id = $row.find('td:eq(0)').text()
            rows.push({
                id: $row.find('td:eq(0)').text(),
                name: $row.find('td:eq(1)').text(),
                quantity: $('#count' + id).val(),
                subtotal: $('#subtotal' + id).text(),
            });
        });
		return JSON.stringify(rows);
	}
});