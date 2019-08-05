//Overriding Variables
var fields = ['first_name', 'last_name', 'image', 'designation', 'description', 'active'];
var method_url = '/employees';

//Overriding Functions
function getRecords(method) {
	var formData = {
		first_name: $(method + fields[0]).val(),
		last_name: $(method + fields[1]).val(),
		image: $(method + fields[2]).val(),
		designation: $(method + fields[3]).val(),
		description: $(method + fields[4]).val(),
		active: $(method + fields[5]).val(),	
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
		$('#employees_' + response.employees.id).replaceWith(RowBuilder(response.employees.id, formData.last_name + ', ' + formData.first_name , formData.designation, formData.active));
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
	$('#update-first_name').val(response.employee.first_name);
	$('#update-last_name').val(response.employee.last_name);
	$('#update-designation').val(response.employee.designation);
	$('#update-description').val(response.employee.description);
	$('#update-submit').val(response.employee.id);
	$('#update-active').val(response.employee.active);
}

function view(response) {
	$('#view-first_name').val(response.employee.first_name);
	$('#view-last_name').val(response.employee.last_name);
	$('#view-designation').val(response.employee.designation);
	$('#view-description').val(response.employee.description);
	$('#view-active').val(response.employee.active);
	$('#view-created_at').val(response.employee.created_at);
	$('#view-updated_at').val(response.employee.updated_at);
}

//Overriding Validators

function confirmValidation(errors, method) {
	$.each(errors, function( key, value) {
		$(method + key).css('border-color', '#FF0000');
		$(method + key + '_message').text(value);
	});
}

//Overriding Builders
function RowBuilder(id, name, designation, active) {
	var str = '<tr id="employees_' + id +'">';
	str += '<td>' + name + '</td>';
	str += '<td>' + designation + '</td>';
	str += '<td class="col_hide">' + active + '</td>';
	str += '<td class="action">'
	str += '<button class="btn btn-primary action btn_view" data-toggle="modal" data-target="#view" value="' + id + '""><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button>';
	str += ' <button class="btn btn-warning action btn_fetch" data-toggle="modal" data-target="#update" value="' + id + '""><i class="fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Edit</span></button>';
	str += '</td></tr>';
	return str;
}

function tableBuilder(response) {
	$('#data').find('tbody').empty();
	if(response.employees.total > 0) {		
		for(var i in response.employees.data) {
			$('#data > tbody:last-child').append(RowBuilder(response.employees.data[i].id, response.employees.data[i].last_name + ', ' + response.employees.data[i].first_name, response.employees.data[i].designation, response.employees.data[i].active));
		}
	} else {
		$('#data > tbody:last-child').append('<tr><td colspan="4"><p>No employee Available</p></td></tr>');
	}
}
