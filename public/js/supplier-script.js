//Overriding Variables
var fields = ['name', 'ref_code', 'email', 'contact', 'address', 'description', 'active'];
var method_url = '/suppliers';

//Overriding Functions
function getRecords(method) {
	var formData = {
		name: $(method + fields[0]).val(),
		ref_code: $(method + fields[1]).val(),
		email: $(method + fields[2]).val(),
		contact: $(method + fields[3]).val(),
		address: $(method + fields[4]).val(),
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
		$('#supplier_' + response.suppliers.id).replaceWith(RowBuilder(response.suppliers.id, formData.name, formData.ref_code, formData.contact, formData.active));
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
	$('#update-name').val(response.supplier.name);
	$('#update-ref_code').val(response.supplier.ref_code);
	$('#update-email').val(response.supplier.email);
	$('#update-contact').val(response.supplier.contact);
	$('#update-address').val(response.supplier.address);
	$('#update-description').val(response.supplier.description);
	$('#update-active').val(response.supplier.active);
	$('#update-submit').val(response.supplier.id);
}

function view(response) {
	$('#view-name').val(response.supplier.name);
	$('#view-ref_code').val(response.supplier.ref_code);
	$('#view-email').val(response.supplier.email);
	$('#view-contact').val(response.supplier.contact);
	$('#view-address').val(response.supplier.address);
	$('#view-description').val(response.supplier.description);
	$('#view-active').val(response.supplier.active);
	$('#view-created_at').val(response.supplier.created_at);
	$('#view-updated_at').val(response.supplier.updated_at);
}

//Overriding Validators

function confirmValidation(errors, method) {
	$.each(errors, function( key, value) {
		$(method + key).css('border-color', '#FF0000');
		$(method + key + '_message').text(value);
	});
}

//Overriding Builders
function RowBuilder(id, name, ref_code, contact, active) {
	var str = '<tr id="supplier_' + id +'">';
	str += '<td class="col_hide">' + ref_code + '</td>';
	str += '<td>' + name + '</td>';
	str += '<td>' + contact + '</td>';
	str += '<td>' + active + '</td>';
	str += '<td class="action">'
	str += '<button class="btn btn-primary action btn_view" data-toggle="modal" data-target="#view" value="' + id + '""><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button>';
	str += ' <button class="btn btn-warning action btn_fetch" data-toggle="modal" data-target="#update" value="' + id + '""><i class="fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Edit</span></button>';
	str += '</td></tr>';
	return str;
}

function tableBuilder(response) {
	$('#data').find('tbody').empty();
	if(response.suppliers.total > 0) {
		for(var i in response.suppliers.data) {
			$('#data > tbody:last-child').append(RowBuilder(response.suppliers.data[i].id, response.suppliers.data[i].name, response.suppliers.data[i].ref_code, response.suppliers.data[i].contact, response.suppliers.data[i].active));
		}
	} else {
		$('#data > tbody:last-child').append('<tr><td colspan="5"><p>No discount Available</p></td></tr>');
	}
}
