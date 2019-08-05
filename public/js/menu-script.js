//Overriding Variables
var fields = ['name', 'ref_code', 'image', 'category_id', 'description', 'cost', 'price', 'active'];
var method_url = '/menus';

//Overriding Functions
function getRecords(method) {
	var formData = {
		name: $(method + fields[0]).val(),
		ref_code: $(method + fields[1]).val(),
		image: $(method + fields[2]).val(),
		category_id: $(method + fields[3]).val(),
		description: $(method + fields[4]).val(),
		cost: $(method + fields[5]).val(),
		price: $(method + fields[6]).val(),
		active: $(method + fields[7]).val(),	
	}
	return formData;
}

function add(response, formData) {
	if(response.success) {
		console.log('success!');
		$('#text_success').text('Information successfully recorded.');
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
		$('#menu_' + response.menus.id).replaceWith(RowBuilder(response.menus.id, formData.name, formData.ref_code, formData.price, formData.active));
		$('#text_success').text('Information successfully updated.');
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
	$('#update-name').val(response.menu.name);
	$('#update-ref_code').val(response.menu.ref_code);
	$('#update-supplier_id').val(response.menu.supplier_id).change();
	$('#update-description').val(response.menu.description);
	$('#update-cost').val(Number(response.menu.cost).toFixed(2));
	$('#update-price').val(Number(response.menu.price).toFixed(2));
	$('#update-profit').val(Number(response.profit).toFixed(2));
	$('#update-active').val(response.menu.active).change;
	$('#update-submit').val(response.menu.id);
}

function view(response) {
	$('#view-name').val(response.menu.name);
	$('#view-ref_code').val(response.menu.ref_code);
	$('#view-category').val(response.menu.category.name);
	$('#view-description').val(response.menu.description);
	$('#view-cost').val(Number(response.menu.cost).toFixed(2));
	$('#view-price').val(Number(response.menu.price).toFixed(2));
	$('#view-profit').val(Number(response.profit).toFixed(2));
	$('#view-active').val(response.menu.active);
	$('#view-created_at').val(response.menu.created_at);
	$('#view-updated_at').val(response.menu.updated_at);
}

//Overriding Validators


//Overriding Builders
function RowBuilder(id, name, ref_code, price, active) {
	var str = '<tr id="menu_' + id +'">';
	str += '<td class="col_hide">' + ref_code + '</td>';
	str += '<td>' + name + '</td>';
	str += '<td>' + price + '</td>';
	str += '<td class="col_hide">' + active + '</td>';
	str += '<td class="action">'
	str += '<button class="btn btn-primary action btn_view" data-toggle="modal" data-target="#view" value="' + id + '""><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button>';
	str += ' <button class="btn btn-warning action btn_fetch" data-toggle="modal" data-target="#update" value="' + id + '""><i class="fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Edit</span></button>';
	str += '</td></tr>';
	return str;
}

function tableBuilder(response) {
	$('#data').find('tbody').empty();
	if(response.menus.total > 0) {
		for(var i in response.menus.data) {
			$('#data > tbody:last-child').append(RowBuilder(response.menus.data[i].id, response.menus.data[i].name, response.menus.data[i].ref_code, response.menus.data[i].price, response.menus.data[i].active));
		}
	} else {
		$('#data > tbody:last-child').append('<tr><td colspan="5"><p>No menu Available</p></td></tr>');
	}
}
