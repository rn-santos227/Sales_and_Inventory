$(document).ready( function(){
	$(document).on('input', '#cashier-input_discount', function() {
		var amount = $('#receipt-base_amount').val();
		value = $(this).val();
		
		if(value === '' || value < 0) {
			$(this).val('0');
			value = 0;
			
		}
		else if(value > 100) {
			$(this).val('100');
			value = 100;
		}

		var discounted = parseFloat(amount) - (parseFloat(amount) * (parseFloat(value) / 100));
		$('#receipt-amount_due').val(discounted.toFixed(2));
	});
});

var subtotal;
var vatable_rate;
var tax_rate;
var vatable;
var non_vat;
var vat;
var vatexempt;
var vatsales;
var count;
var disc;
var service_charge;
var mode;
var additional = 0;
var base_amount = 0;

//Global Total
function getTotal(controller, receipt_id) {
	$.ajax({
		type: 'POST',
		headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   		},
		url: controller,
		data: {
          	receipt_id: receipt_id,
        },	
		success: function(response) {
			subtotal = response.total;
			non_vat = response.setting.non_vat;
			vatable_rate = response.setting.vatable;
			tax_rate = response.setting.tax_rate;
			service_charge = response.setting.service_charge;
			mode = response.setting.system_mode;
			if(non_vat == 1)
			{
				vatable = subtotal;
				vat = 0;
				vatsales = 0;
			}
			else
			{
				vatable = subtotal/1.12;
				vat = vatable*tax_rate;
				vatsales = vatable;
			}
			
			count = response.count;
			getDiscount(0);
		},
		error: function(data) {
    		console.log('error!');
    	}
	})
}

function getDiscount(discount) {
	$('#receipt-discount').val(discount > 0 ? parseFloat((parseFloat(discount) / 100) * parseFloat(vatable)).toFixed(2) : parseFloat(discount).toFixed(2));
	disc = $('#receipt-discount').val();

	if($('#receipt-discount').val() > 0)
	{
		// with discount

		$('#order-subtotal').val(parseFloat(subtotal).toFixed(2));
		$('#receipt-subtotal').val(subtotal);
		$('#receipt-count').val(count);
		$('#receipt-vatable').val(0);
		$('#receipt-vat_sales').val(0);
		$('#receipt-vat').val(parseFloat(vat).toFixed(2));
		$('#receipt-exempted').val(parseFloat(vatable).toFixed(2));
		$('#receipt-base_amount').val(parseFloat(subtotal-vat-disc).toFixed(2));
		base_amount = $('#receipt-base_amount').val();
		$('#receipt-service_charge').val(parseFloat(base_amount * (service_charge / 100)).toFixed(2));
		additional = mode == 'Restaurant' ? $('#receipt-service_charge').val() : 0;
		$('#receipt-base_amount').val(Number(parseFloat(base_amount) + parseFloat(additional)).toFixed(2));
	}

	else
	{
		// w/out discount

		$('#order-subtotal').val(parseFloat(subtotal).toFixed(2));
		$('#receipt-subtotal').val(subtotal);
		$('#receipt-count').val(count);
		$('#receipt-vatable').val(parseFloat(vatable).toFixed(2));
		$('#receipt-vat_sales').val(parseFloat(vatsales).toFixed(2));
		$('#receipt-vat').val(parseFloat(vat).toFixed(2));
		$('#receipt-exempted').val(0);
		$('#receipt-base_amount').val(subtotal)
		base_amount = $('#receipt-base_amount').val();
		$('#receipt-service_charge').val(parseFloat(base_amount * (service_charge / 100)).toFixed(2));
		additional = mode == 'Restaurant' ? $('#receipt-service_charge').val() : 0;
		$('#receipt-base_amount').val(Number(parseFloat(base_amount) + parseFloat(additional)).toFixed(2));
	}

	$('#receipt-amount_due').val($('#receipt-base_amount').val());	
	$('#cashier-amount_due').val($('#receipt-base_amount').val());	
	$('#cashier-count').val(count);
	$('#cashier-cash').val(parseFloat(0).toFixed(2));	
	$('#cashier-change_due').val(parseFloat(0).toFixed(2));		
	$('#btn_discount').text(discount + '% ').append('<span class="caret"></span>');
	$('#cashier-submit').prop('disabled', true);

	$('#order-item_count').val(count);
}

function compute(cash) {
	var amount_due = $('#receipt-amount_due').val();
	var change = Number(cash) - Number(amount_due);
	$('#cashier-change_due').val(change.toFixed(2));
	if(change < 0) $('#cashier-submit').prop('disabled', true);
	else $('#cashier-submit').prop('disabled', false);
}

function promo(ref_code, controller) {
	$.ajax({
		type: 'POST',
		headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   		},
		url: controller,
		data: {
          	ref_code: ref_code,
        },
        success: function(response) {
        	if(response.success) {
        		console.log('success');
        		var amount = parseFloat(base_amount) + parseFloat(additional);
        		$('#promo-ref_code_message').text('');
        		$('#promo-type').val(response.promo.type);
        		$('#promo-value').val(response.promo.value);
        		$('#promo-description').val(response.promo.description);
        		console.log(amount);

        		if(response.promo.type == 'Percentage') {
        			var new_amount = parseFloat(amount) - (parseFloat(amount) * (response.promo.value / 100)); 
        			$('#receipt-base_amount').val(new_amount.toFixed(2));
        		} 

        		else if(response.promo.type == 'Deduction') {
        			var new_amount = parseFloat(amount) - parseFloat(response.promo.value);
        			$('#receipt-base_amount').val(new_amount < 0 ? 0 : new_amount.toFixed(2));
        		}
        		else {
        			$('#receipt-base_amount').val(Number(parseFloat(base_amount) + parseFloat(additional)).toFixed(2));	
        		}

        	} else {
        		$('#promo-ref_code_message').text(response.message);
        		$('#receipt-base_amount').val(Number(parseFloat(base_amount) + parseFloat(additional)).toFixed(2));	
        	}
        	$('#receipt-amount_due').val($('#receipt-base_amount').val());
        },
        
		error: function(data) {
    		console.log('error!');
    	}        	
	})
}