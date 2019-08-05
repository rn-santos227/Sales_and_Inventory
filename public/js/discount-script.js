//Overriding Variables
var fields = ['name', 'ref_code', 'rate', 'description','active'];
var method_url = '/discounts';

//Overriding Functions
function getRecords(method) {
	var formData = {
		name: $(method + fields[0]).val(),
		ref_code: $(method + fields[1]).val(),
		rate: $(method + fields[2]).val(),
		description: $(method + fields[3]).val(),
		active: $(method + fields[4]).val(),	
	}
	return formData;
}

function add(response, formData) {
	if(response.success) {
		console.log('success!');
		$('#dialog-success').modal('toggle');
		$('#create').modal('toggle');
		setFieldsToBlank('#add-');
		fillTable('', '');
	}
	else {
		console.log('error validation!');
		confirmValidation(response.errors, '#add-');
	}
}

function update(response, formData) {
	if(response.success) {
		console.log('success!');
		$('#discounts_' + response.discounts.id).replaceWith(RowBuilder(response.discounts.id, formData.name, formData.ref_code, formData.rate, formData.active));
		$('#dialog-success').modal('toggle');
		$('#update').modal('toggle');
		setFieldsToBlank('#udpate-');
	}
	else {
		console.log('error validation!');
		confirmValidation(response.errors, '#update-');		
	}
}

function fetch(response) {
	$('#update-name').val(response.discount.name);
	$('#update-ref_code').val(response.discount.ref_code);
	$('#update-rate').val(response.discount.rate);
	$('#update-description').val(response.discount.description);
	$('#update-submit').val(response.discount.id);
	$('#update-active').val(response.discount.active);
}

function view(response) {
	$('#view-name').val(response.discount.name);
	$('#view-ref_code').val(response.discount.ref_code);
	$('#view-rate').val(response.discount.rate);
	$('#view-description').val(response.discount.description);
	$('#view-active').val(response.discount.active);
	$('#view-created_at').val(response.discount.created_at);
	$('#view-updated_at').val(response.discount.updated_at);
}

//Overriding Validators

function confirmValidation(errors, method) {
	$.each(errors, function( key, value) {
		$(method + key).css('border-color', '#FF0000');
		$(method + key + '_message').text(value);
	});
}

//Overriding Builders
function RowBuilder(id, name, ref_code, rate, active) {
	var str = '<tr id="discounts_' + id +'">';
	str += '<td class="col_hide">' + ref_code + '</td>';
	str += '<td>' + name + '</td>';
	str += '<td>' + rate + '</td>';
	str += '<td>' + active + '</td>';
	str += '<td class="action">'
	str += '<button class="btn btn-primary action btn_view" data-toggle="modal" data-target="#view" value="' + id + '""><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button>';
	str += ' <button class="btn btn-warning action btn_fetch" data-toggle="modal" data-target="#update" value="' + id + '""><i class="fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Edit</span></button>';
	str += '</td></tr>';
	return str;
}

function tableBuilder(response) {
	$('#data').find('tbody').empty();
	if(response.discounts.total > 0) {		
		for(var i in response.discounts.data) {
			$('#data > tbody:last-child').append(RowBuilder(response.discounts.data[i].id, response.discounts.data[i].name, response.discounts.data[i].ref_code, response.discounts.data[i].rate, response.discounts.data[i].active));
		}
	} else {
		$('#data > tbody:last-child').append('<tr><td colspan="4"><p>No Discount Available</p></td></tr>');
	}
}
