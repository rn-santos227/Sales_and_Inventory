$(document).ready(function() {
	
});


//Overriding Variables
var fields = ['name', 'ref_code', 'type', 'value', 'expiration_date', 'description', 'active'];
var method_url = '/promos';

//Overriding Functions
function getRecords(method) {
	var formData = {
		name: $(method + fields[0]).val(),
		ref_code: $(method + fields[1]).val(),
		type: $(method + fields[2]).val(),
		value: $(method + fields[3]).val(),
		expiration_date: $(method + fields[4]).val(),
		description: $(method + fields[5]).val(),
		active: $(method + fields[6]).val(),	
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
		$('#promos_' + response.promos.id).replaceWith(RowBuilder(response.promos.id, formData.name, formData.ref_code, formData.type, formData.active));
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
	$('#update-name').val(response.promo.name);
	$('#update-ref_code').val(response.promo.ref_code);
	$('#update-type').val(response.promo.type);
	$('#update-value').val(response.promo.value);
	$('#update-expiration_date').val(response.promo.expiration_date);
	$('#update-description').val(response.promo.description);
	$('#update-submit').val(response.promo.id);
	$('#update-active').val(response.promo.active);
}

function view(response) {
	$('#view-name').val(response.promo.name);
	$('#view-ref_code').val(response.promo.ref_code);
	$('#view-type').val(response.promo.type);
	$('#view-value').val(response.promo.value);
	$('#view-expiration_date').val(response.promo.expiration_date);	
	$('#view-description').val(response.promo.description);
	$('#view-active').val(response.promo.active);
	$('#view-created_at').val(response.promo.created_at);
	$('#view-updated_at').val(response.promo.updated_at);
}

//Overriding Validators

function confirmValidation(errors, method) {
	$.each(errors, function( key, value) {
		$(method + key).css('border-color', '#FF0000');
		$(method + key + '_message').text(value);
	});
}

//Overriding Builders
function RowBuilder(id, name, ref_code, type, active) {
	var str = '<tr id="promos_' + id +'">';
	str += '<td class="col_hide">' + ref_code + '</td>';
	str += '<td>' + name + '</td>';
	str += '<td>' + type + '</td>';
	str += '<td class="col_hide">' + active + '</td>';
	str += '<td class="action">'
	str += '<button class="btn btn-primary action btn_view" data-toggle="modal" data-target="#view" value="' + id + '""><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button>';
	str += ' <button class="btn btn-warning action btn_fetch" data-toggle="modal" data-target="#update" value="' + id + '""><i class="fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Edit</span></button>';
	str += '</td></tr>';
	return str;
}

function tableBuilder(response) {
	$('#data').find('tbody').empty();
	if(response.promos.total > 0) {		
		for(var i in response.promos.data) {
			$('#data > tbody:last-child').append(RowBuilder(response.promos.data[i].id, response.promos.data[i].name, response.promos.data[i].ref_code, response.promos.data[i].type, response.promos.data[i].active));
		}
	} else {
		$('#data > tbody:last-child').append('<tr><td colspan="4"><p>No promo Available</p></td></tr>');
	}
}
