//Overriding Variables
var fields = ['name', 'ref_code', 'description', 'active'];
var method_url = '/tables';

//Overriding Functions
function getRecords(method) {
	var formData = {
		name: $(method + fields[0]).val(),
		ref_code: $(method + fields[1]).val(),
		description: $(method + fields[2]).val(),
		active: $(method + fields[3]).val(),	
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
		$('#table_' + response.tables.id).replaceWith(RowBuilder(response.tables.id, formData.name, formData.ref_code, formData.active));
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
	$('#update-name').val(response.table.name);
	$('#update-ref_code').val(response.table.ref_code);
	$('#update-description').val(response.table.description);
	$('#update-submit').val(response.table.id);
	$('#update-active').val(response.table.active);
}

function view(response) {
	$('#view-name').val(response.table.name);
	$('#view-ref_code').val(response.table.ref_code);
	$('#view-description').val(response.table.description);
	$('#view-active').val(response.table.active);
	$('#view-created_at').val(response.table.created_at);
	$('#view-updated_at').val(response.table.updated_at);
}

//Overriding Validators

function confirmValidation(errors, method) {
	$.each(errors, function( key, value) {
		$(method + key).css('border-color', '#FF0000');
		$(method + key + '_message').text(value);
	});
}

//Overriding Builders
function RowBuilder(id, name, ref_code, active) {
	var str = '<tr id="table_' + id +'">';
	str += '<td class="col_hide">' + ref_code + '</td>';
	str += '<td>' + name + '</td>';
	str += '<td>' + active + '</td>';
	str += '<td class="action">'
	str += '<button class="btn btn-primary action btn_view" data-toggle="modal" data-target="#view" value="' + id + '""><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button>';
	str += ' <button class="btn btn-warning action btn_fetch" data-toggle="modal" data-target="#update" value="' + id + '""><i class="fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Edit</span></button>';
	str += '</td></tr>';
	return str;
}

function tableBuilder(response) {
	$('#data').find('tbody').empty();
	if(response.tables.total > 0) {
		for(var i in response.tables.data) {
			$('#data > tbody:last-child').append(RowBuilder(response.tables.data[i].id, response.tables.data[i].name, response.tables.data[i].ref_code, response.tables.data[i].active));
		}
	} else {
		$('#data > tbody:last-child').append('<tr><td colspan="4"><p>No table Available</p></td></tr>');
	}
}
