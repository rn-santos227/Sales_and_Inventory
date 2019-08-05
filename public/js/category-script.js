//Overriding Variables
var fields = ['name', 'ref_code', 'description', 'active'];
var method_url = '/categories';

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
		$('#category_' + response.categories.id).replaceWith(RowBuilder(response.categories.id, formData.name, formData.ref_code, formData.active));
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
	$('#update-name').val(response.category.name);
	$('#update-ref_code').val(response.category.ref_code);
	$('#update-description').val(response.category.description);
	$('#update-submit').val(response.category.id);
	$('#update-active').val(response.category.active);
}

function view(response) {
	$('#view-name').val(response.category.name);
	$('#view-ref_code').val(response.category.ref_code);
	$('#view-description').val(response.category.description);
	$('#view-active').val(response.category.active);
	$('#view-created_at').val(response.category.created_at);
	$('#view-updated_at').val(response.category.updated_at);
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
	var str = '<tr id="category_' + id +'">';
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
	if(response.categories.total > 0) {
		for(var i in response.categories.data) {
			$('#data > tbody:last-child').append(RowBuilder(response.categories.data[i].id, response.categories.data[i].name, response.categories.data[i].ref_code, response.categories.data[i].active));
		}
	} else {
		$('#data > tbody:last-child').append('<tr><td colspan="4"><p>No category Available</p></td></tr>');
	}
}
